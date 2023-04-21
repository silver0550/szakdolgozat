<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, LogsActivity, CausesActivity;

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

     /**
     * Get the property record associated with the user.
     */
    public function property(){
        
        return $this->hasOne(UserProperty::class);

    }

    public function isAdmin(){

        return $this->hasOne(Admin::class);
    }

    public function pwReset(){

        return $this->hasOne(PasswordReset::class);

    }

    // public function name(): Attribute
    // {
    //     return Attribute::make(
    //         set: fn($value) => Str::title($value),
    //     );
    // }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
