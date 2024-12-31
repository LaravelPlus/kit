<?php

namespace App\Models;

use Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /** @use HasFactory<TeamFactory> */
    use HasFactory;

    protected $guarded = [];

//    protected $fillable = [
//        'uuid',
//        'name',
//        'slug',
//        'description',
//        'user_id',
//        'is_active',
//        'created_by',
//        'updated_by',
//    ];


}
