<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PasswordReset extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [];

    protected $hidden = [];

    protected $attributes = [
        'isActive' => 1,
    ];

    protected $guarded = [];

    protected $casts =[];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
