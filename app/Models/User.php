<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use App\Models\UserProperty;
use App\Models\Admin;
use App\Models\PasswordReset;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens,
        HasFactory,
        Notifiable,
        LogsActivity,
        CausesActivity,
        HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_path',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()
            ->dontLogIfAttributesChangedOnly(['remember_token']);
    }

    public function property(): HasOne
    {
        return $this->hasOne(UserProperty::class);
    }
    public function tools(): HasMany
    {
        return $this->hasMany(Tool::class);
    }


    public function getTools(): Collection //TODO:attribute
    {
        return $this->tools()
                    ->get()
                    ->map( fn($tool) => $tool->owner);
    }
    public function pwReset(): HasOne
    {
        return $this->hasOne(PasswordReset::class);
    }

    public function name(): Attribute
    {
        return Attribute::make(
            set: fn($value) => Str::title($value),
        );
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
