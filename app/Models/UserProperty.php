<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Str;

class UserProperty extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [];

    protected $hidden = [];

    protected $attributes = [
        'isleader' => 0,
    ];

    protected $guarded = [];

    protected $casts =[
        'language_knowledge' => 'array',
    ];

    public function user(){
        
        return $this->belongsTo(User::class);
    }

    public function placeOfBirth():Attribute
    {
        return Attribute::make(
            set: fn($value) => Str::title($value),
        );
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
