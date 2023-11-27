<?php

namespace App\Models;

use App\Enum\PictureProviderEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        LogsActivity,
        SoftDeletes,
        CausesActivity,
        HasRoles;

    const BASE_PASSWORD = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; //password

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'password' => self::BASE_PASSWORD,
    ];

    protected $casts = [
        'created_at' => 'date',
        'updated_at' => 'date',
    ];
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()
            ->dontLogIfAttributesChangedOnly(['remember_token']);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
    public function property(): HasOne
    {
        return $this->hasOne(UserProperty::class);
    }

    public function tools(): HasMany
    {
        return $this->hasMany(Tool::class);
    }

    public function pwReset(): HasOne
    {
        return $this->hasOne(PasswordReset::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */
    public function getTools(): Collection //TODO:attribute
    {
        return $this->tools()
            ->get()
            ->map(fn($tool) => $tool->owner);
    }

    public function name(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Str::title($value),
        );
    }

    public function getPhoneNumberAttribute(): ?string
    {
        return Tool::query()
            ->where('user_id', $this->id)
            ->where('owner_type', SimCard::class)
            ->first()
            ?->owner
            ?->call_number;
    }

    public function getImgAttribute(): string
    {
        return $this->avatar_path
            ? 'storage/' . $this->avatar_path
            : PictureProviderEnum::DEFAULT_AVATAR->value;
    }
    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
