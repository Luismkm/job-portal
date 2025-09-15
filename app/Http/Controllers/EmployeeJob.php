<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Job;
use Illuminate\Http\Request;

class EmployeeJob extends Controller
{
    public function show($jobId)
    {

        $can = Job::where('id', $jobId)->with('employees')->first();

        /* dd($can); */



        /* return response()->json(
            $can = Job::where('id', $jobId)->with('employees')->first()
        ); */

        return response()->json([
            'employees' => $can->employees->map(function ($e) {
                return [
                    'id' => $e->id,
                    'name' => $e->name,
                    'status' => $e->pivot->status,
                    'user_id' => $e->pivot->user_id, // vem da pivot
                ];
            })
        ]);
    }

    public function download(Request $request, $jobId)
    {
        $job = Job::findOrFail($jobId);
        $userIds = $request->input('user_ids', []);

        if (empty($userIds)) {
            return response()->json(['error' => 'Nenhum candidato selecionado.'], 400);
        }

        $folderName = \Illuminate\Support\Str::slug($job->title, '_');
        $zipFileName = $folderName . '_' . time() . '.zip';
        $zipPath = storage_path("app/public/zips/{$zipFileName}");

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

        return response()->json([
            'url' => asset("storage/zips/{$zipFileName}")
        ]);
    }
}
