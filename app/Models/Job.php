<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

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
