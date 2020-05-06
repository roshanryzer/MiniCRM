<?php

namespace App\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use Sluggable;

    protected $fillable = [
        'name',
        'email',
        'logo',
        'website'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
