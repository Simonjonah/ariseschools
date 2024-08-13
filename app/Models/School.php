<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
class School extends Authenticatable
{
    use HasFactory;


    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'schoolname'
            ]
        ];
    }



    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }
    
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }

    
    
}
