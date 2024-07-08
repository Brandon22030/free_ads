<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\Contracts\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Categories extends Model
{
    use HasApiTokens, HasFactory, Notifiable;



    protected $fillable = [
        'name',
    ];

    public function ads(){

        return $this->hasMany(Post::class);

    }

}
