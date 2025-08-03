<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Support\Str;

class User extends Authenticable
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'token',
        'email_verified_at',
        'status',
        'role',
        'permission'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'user_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function humanResourceUser()
    {
        return $this->hasOne(HumanResourcesUser::class);
    }
}
