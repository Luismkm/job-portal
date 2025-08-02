<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'state_id'
    ];

    public function states()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function Companies()
    {
        return $this->hasMany(Company::class, 'city_id');
    }

    public function Jobs()
    {
        return $this->hasMany(Job::class, 'city_id');
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'city_id');
    }
}
