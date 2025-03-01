<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Racha extends Model
{
    use HasFactory, HasApiTokens;

    function user(){
        return $this->belongsTo(User::class);
    }

}
