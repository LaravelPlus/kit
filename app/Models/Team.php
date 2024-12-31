<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\TeamFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Team extends Model
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
