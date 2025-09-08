<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmAccountEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\HumanResourcesUser;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class HumanResourcesController extends Controller
{
    public function home()
    {
        return view('human-resources.dashboard');
    }

    public function create()
    {
        return view('human-resources.create');
    }

    public function store(Request $request)
    {
        $company_id = Company::where('id', $request->company_id)->value('id');

        if ($company_id) {
            $request->validate(
                [
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255|unique:users,email'
                ],
                [
                    'name.required' => 'O campo name deve ser preenchido.',
                    'email.required' => 'O campo email deve ser preenchido.',
                    'email.unique' => 'O email já está em uso.'
                ]
            );
        }

        $token = Str::random(60);

        DB::transaction(function () use ($request, $token) {
            $user = User::create([
                'company_id' =>  $request->company_id,
                'name' =>   $request->name,
                'email' =>   $request->email,
                'password' => Hash::make(Str::random(10)),
                'role' => 'human-resources',
                'token' => $token
            ]);

            HumanResourcesUser::create([
                'company_id' =>   $request->company_id,
                'user_id' => $user->id
            ]);
        });

        Mail::to($request->email)->send(new ConfirmAccountEmail(route('confirm-account', $token)));


        return redirect()
            ->back()
            ->with('success', 'Usuário cadastrado com sucesso.');
    }

    public function list(){

        $rhUsers = HumanResourcesUser::where('company_id', auth()->user()->company->id)->with('user')->paginate(15);

        /* dd($rhUsers[0]->users); */

        return view('human-resources.list', compact('rhUsers'));
    }
}
