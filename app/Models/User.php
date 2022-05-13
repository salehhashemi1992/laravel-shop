<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'two_factor_auth_type',
        'phone_number',
        'is_admin',
        'is_moderator'
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hasTwoFactorAuth($key)
    {
        return $this->two_factor_auth_type == $key;
    }

    public function activationCode()
    {
        return $this->hasMany(ActivationCode::class);
    }

    public function isActiveTwoFactor()
    {
        return $this->two_factor_auth_type != 'off';
    }

    public function isPhoneAuthenticationEnabled()
    {
        return $this->two_factor_auth_type == 'phone';
    }

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification());
    }

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function isModerator()
    {
        return $this->is_moderator;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function hasPermission($permission)
    {
        return $this->permissions->contains('name', $permission->name) || $this->hasRole($permission->roles);
    }

    private function hasRole($roles)
    {
        return !!$roles->intersect($this->roles)->all();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
