<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaveInfo extends Model
{
    use SoftDeletes;

    protected $table = 'save_infos';

    protected $fillable = [
        'user_id',
        'description',
    ];
}
