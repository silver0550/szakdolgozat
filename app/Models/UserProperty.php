<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class UserProperty extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [];

    protected $hidden = [];

    protected $attributes = [
        'isleader' => 0,
    ];

    protected $guarded = [];

    public function user(){
        
        return $this->belongsTo(User::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
