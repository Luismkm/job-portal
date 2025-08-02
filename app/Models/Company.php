<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'ein',
        'email',
        'password',
        'avatar',
        'city_id'
    ];

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function humanResourceUsers()
    {
        return $this->hasMany(HumanResourceUser::class, 'company_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id');
    }
}
