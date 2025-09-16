<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Job;
use Illuminate\Http\Request;

class EmployeeJob extends Controller
{
    public function show($jobId)
    {

        $candidates = Job::where('id', $jobId)->with('employees')->first();

        return response()->json([
            'employees' => $candidates->employees->map(function ($e) {
                return [
                    'id' => $e->id,
                    'name' => $e->name,
                    'status' => $e->pivot->status,
                    'user_id' => $e->pivot->user_id, // vem da pivot
                ];
            })
        ]);
    }

    public function prepareDownload(Request $request, $jobId)
    {
        $job = Job::findOrFail($jobId);
        $userIds = $request->input('user_ids', []);

        if (empty($userIds)) {
            return response()->json(['error' => 'Nenhum candidato selecionado.'], 400);
        }

        $folderName = \Illuminate\Support\Str::slug($job->title, '_');
        $zipFileName = $folderName . '_' . time() . '.zip';
        $zipPath = storage_path("app/tmp/{$zipFileName}");

        \Illuminate\Support\Facades\Storage::disk('public')->makeDirectory('zips');

        $zip = new \ZipArchive;
        if ($zip->open($zipPath, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) === TRUE) {

            // busca só os employees selecionados
            $employees = $job->employees()->whereIn('users.id', $userIds)->get();
            foreach ($employees as $employee) {
                if ($employee->pivot && $employee->pivot->cv_path) {
                    $filePath = storage_path("app/public/" . $employee->pivot->cv_path);
                    logger("Checando arquivo: " . $filePath);

                    if (file_exists($filePath)) {
                        logger("Adicionando ao ZIP: " . $filePath);
                        $zip->addFile($filePath, "{$folderName}/" . basename($filePath));
                    } else {
                        logger("Arquivo NÃO encontrado: " . $filePath);
                    }
                }
            }

            $zip->close();
        }

        $token = base64_encode($zipFileName);
        cache()->put("zip_{$token}", $zipPath, 300); // expira em 5 min

        return response()->json([
            'url' => route('download.zip', ['token' => $token])
        ]);
    }

    public function downloadZip($token)
    {
        $zipPath = cache()->pull("zip_{$token}");
        if (!$zipPath || !file_exists($zipPath)) {
            abort(404);
        }

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }
}
