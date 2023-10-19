<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class UserProperty extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $casts = [
        'language_knowledge' => 'array',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function placeOfBirth(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Str::title($value),
        );
    }
}
