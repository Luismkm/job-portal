<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'key_responsibilities',
        'professional_skills',
        'experience',
        'degree',
        'tag',
        'salary',
        'period',
        'status',
        'category',
        'city_id',
        'company_id'
    ];

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function companies()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_job', 'job_id', 'employee_id')
                ->withPivot('status')
                ->withTimestamps();
    }
}
