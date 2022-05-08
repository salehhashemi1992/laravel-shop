<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivationCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'token',
        'expired_at'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);

    }

    public function scopeTokenGenerate($query, User $user)
    {
        if ($token = $this->getActiveUserToken($user)) {
            $token = $token->token;
        } else {
            do {
                $token = mt_rand(10000, 99999);
            } while ($this->checkIfTokenIsUnique($user, $token));

            $user->activationCode()->create([
                'token' => $token,
                'expired_at' => now()->addMinutes(10)
            ]);
        }

        return $token;
    }

    /**
     * @var $user User
     */
    private function checkIfTokenIsUnique($user, int $token)
    {
        return !!$user->activationCode()->whereToken($token)->first();
    }

    /**
     * @var $user User
     */
    private function getActiveUserToken($user)
    {
        return $user->activationCode()->where('expired_at', '>', now())->first();
    }

    /**
     * @var $user User
     */
    public function scopeTokenConfirm($query, $token, $user)
    {
        return !! $user->activationCode()->whereToken($token)->where('expired_at', '>', now())->first();
    }
}
