<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
Use Spatie\Activitylog\LogOptions;
use App\Models\User;

class Tool extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'owner_type',
        'owner_id',
        'user_id',
    ];

    public function owner(){

        return $this->morphTo();
    
    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
