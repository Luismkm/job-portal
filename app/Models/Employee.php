<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'user_id',
        'city_id'
    ];


    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'employee_job', 'user_id', 'job_id')
                ->withPivot('status')
                ->withTimestamps();
    }
}
