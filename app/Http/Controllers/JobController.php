<?php

namespace App\Http\Controllers;

use App\Enums\CategoryEnum;
use App\Enums\DegreeEnum;
use App\Enums\ExperienceEnum;
use App\Enums\PeriodEnum;
use App\Enums\SalaryEnum;
use App\Models\City;
use App\Models\Company;
use App\Models\Job;
use App\Models\State;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function create()
    {
        $allStates = State::all();
        return view('job.create', compact('allStates'));
    }

    public function store(Request $request)
    {
        $company_id = Company::where('id', $request->company_id)->value('id');


        if ($company_id) {

            $categories = implode(',', array_column(CategoryEnum::cases(), 'value'));
            $experience = implode(',', array_column(ExperienceEnum::cases(), 'value'));
            $degree = implode(',', array_column(DegreeEnum::cases(), 'value'));
            $period = implode(',', array_column(PeriodEnum::cases(), 'value'));
            $salary = implode(',', array_column(SalaryEnum::cases(), 'value'));


            $request->validate(
                [
                    'company_id' => 'required|exists:companies,id',
                    'title' => 'required|string|max:255',
                    'description' => 'required|string|max:1000',
                    'category' => 'required|in:' . $categories,
                    'experience' => 'required|in:' . $experience,
                    'degree' => 'required|in:' . $degree,
                    'period' => 'required|in:' . $period,
                    'salary' => 'required|in:' . $salary,
                    'city' => 'required',
                ],
                [
                    'title.required' => 'O campo título deve ser preenchido.',
                    'description.required' => 'O campo descrição deve ser preenchido.',
                    'category.required' => 'O campo categoria deve ser preenchido.',
                    'category.in' => 'Categoria está inválido.',
                    'experience.required' => 'O campo experiência deve ser preenchido.',
                    'experience.in' => 'Experiência está inválido.',
                    'degree.required' => 'O campo formação deve ser preenchido.',
                    'degree.in' => 'Formação está inválido.',
                    'period.required' => 'O campo período deve ser preenchido.',
                    'period.in' => 'Período está inválido.',
                    'salary.required' => 'O campo salário deve ser preenchido.',
                    'salary.in' => 'Salário está inválido.',
                    'city.required' => 'O campo cidade deve ser selecionado.',
                ]
            );


            Job::create([
                'company_id' =>   $company_id,
                'title' =>        $request->title,
                'description' =>  $request->description,
                'key_responsibilities' => $request->key_responsibilities,
                'professional_skills' => $request->skills,
                'category' =>     $request->category,
                'experience' =>   $request->experience,
                'degree' =>       $request->degree,
                'period' =>       $request->period,
                'salary' =>       $request->salary,
                'status' =>       'ativo',
                'city_id' =>         $request->city,
            ]);

            return redirect()
                ->back()
                ->with('success', 'Vaga cadastrada com sucesso.');
        }
    }

    public function list(){
        $jobs = Job::where('company_id',auth()->user()->company->id)
                    ->where('status', 'ativo')
                    ->orderBy('created_at', 'DESC')
                    ->paginate(15);
        return view('job.list', compact('jobs'));
    }

    public function edit($id)
    {
        $job = Job::where('id', $id)->with('cities')->first();
        $stateJob = State::where('id', $job->city_id)->first();
        $allStates = State::all();
        // dd($allStates[1]->id == $stateJob->id);
        $allCitiesByJobState = City::where('state_id', $job->cities->state_id)->get();
        /* dd($job); */
        if($job){
            return view('job.edit', compact('job', 'allStates', 'stateJob', 'allCitiesByJobState'));
        }
    }

    public function update(Request $request)
    {
        $job = Job::where('id', $request->job_id)->first();

        if($job){
            $categories = implode(',', array_column(CategoryEnum::cases(), 'value'));
            $experience = implode(',', array_column(ExperienceEnum::cases(), 'value'));
            $degree = implode(',', array_column(DegreeEnum::cases(), 'value'));
            $period = implode(',', array_column(PeriodEnum::cases(), 'value'));
            $salary = implode(',', array_column(SalaryEnum::cases(), 'value'));


            $request->validate(
                [
                    'job_id' => 'required|exists:jobs,id',
                    'title' => 'required|string|max:255',
                    'description' => 'required|string|max:1000',
                    'category' => 'required|in:' . $categories,
                    'experience' => 'required|in:' . $experience,
                    'degree' => 'required|in:' . $degree,
                    'period' => 'required|in:' . $period,
                    'salary' => 'required|in:' . $salary,
                    'city' => 'required',
                ],
                [
                    'title.required' => 'O campo título deve ser preenchido.',
                    'description.required' => 'O campo descrição deve ser preenchido.',
                    'category.required' => 'O campo categoria deve ser preenchido.',
                    'category.in' => 'Categoria está inválido.',
                    'experience.required' => 'O campo experiência deve ser preenchido.',
                    'experience.in' => 'Experiência está inválido.',
                    'degree.required' => 'O campo formação deve ser preenchido.',
                    'degree.in' => 'Formação está inválido.',
                    'period.required' => 'O campo período deve ser preenchido.',
                    'period.in' => 'Período está inválido.',
                    'salary.required' => 'O campo salário deve ser preenchido.',
                    'salary.in' => 'Salário está inválido.',
                    'city.required' => 'O campo cidade deve ser selecionado.',
                ]
            );
        }



        $job->update([
            'title' => $request->title,
            'description' => $request->description,
            'key_responsibilities' => $request->key_responsibilities,
            'professional_skills' => $request->skills,
            'category' => $request->category,
            'experience' => $request->experience,
            'degree' => $request->degree,
            'period' => $request->period,
            'salary' => $request->salary,
            'city' => $request->city

        ]);

        return redirect()->route('job.list');

    }
}
