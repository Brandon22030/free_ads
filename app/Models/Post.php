<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{   

    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'image' ,
        'category',
        'description',
        'price',
        'user_id',
        'location',
        'ad_state'
    ];

    public function user(){

        return $this->belongsTo(User::class);

    }

    public function category(){

        return $this->belongsTo(Categories::class);

    }


    use HasFactory;

    



// // public function users(): BelongsTo
// // { 
// //     return $this->belongsTo(User::class); 
// // }



}
