<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Company;
use App\Models\Employee;
use App\Models\HumanResourcesUser;
use App\Models\Job;
use App\Models\State;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        State::factory()->createMany([
            [
                'name' => 'Paraná',
                'state_code' => 'PR'
            ],
            [
                'name' => 'Santa Catarina',
                'state_code' => 'SC'
            ],
            [
                'name' => 'Rio Grande do Sul',
                'state_code' => 'RS'
            ]
        ]);

        $paranaId = State::where('state_code', 'PR')->value('id');
        $scId = State::where('state_code', 'SC')->value('id');
        $rsId = State::where('state_code', 'RS')->value('id');


        City::factory()->createMany([
            [
                'name' => 'Curitiba',
                'state_id' => $paranaId
            ],
            [
                'name' => 'Florianópolis',
                'state_id' => $scId
            ],
            [
                'name' => 'Porto Alegre',
                'state_id' => $rsId
            ]
        ]);

        Company::factory(5)->create();

        HumanResourcesUser::factory(3)->create();

        Job::factory(5)->create();

        Employee::factory(10)
            ->afterCreating(function ($employee) {
                $jobs = Job::inRandomOrder()->take(rand(1, 3))->pluck('id');

                foreach ($jobs as $jobId) {
                    DB::table('employee_job')->insert([
                        'user_id' => $employee->user_id,
                        'job_id' => $jobId,
                        'status' => 'saved',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            })
            ->create();
    }
}
