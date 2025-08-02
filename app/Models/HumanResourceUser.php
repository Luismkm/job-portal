<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HumanResourceUser extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'company_id'
    ];

    public function companies()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
