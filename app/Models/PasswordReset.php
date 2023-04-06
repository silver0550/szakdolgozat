<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{

    protected $fillable = [];

    protected $hidden = [];

    protected $attributes = [
        'isActive' => 1,
    ];

    protected $guarded = [];

    protected $casts =[];

}
