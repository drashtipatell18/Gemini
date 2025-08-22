<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewGem extends Model
{
    
    protected $fillable = ['user_id','name', 'description'];
}
