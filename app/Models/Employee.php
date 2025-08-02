<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'city_id',
        'avatar'
    ];

    public function Cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'employee_job', 'employee_id', 'job_id')
                ->withPivot('status')
                ->withTimestamps();
    }
}
