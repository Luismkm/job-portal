<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Company extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'ein',
        'email',
        'password',
        'avatar',
        'city_id'
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

    public function cities()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function humanResourceUsers()
    {
        return $this->hasMany(HumanResourcesUser::class, 'company_id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id');
    }
}
