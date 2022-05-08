<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    use TwoFactorAuthentication;

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     *
     * @param Request $request
     * @var User $user
     */
    public function callback(Request $request)
    {
        try {
            $g_user = Socialite::driver('google')->user();

            $user = User::where('email', $g_user->email)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $g_user->name,
                    'email' => $g_user->email,
                    'password' => bcrypt(\Str::random(16)),
                    'two_factor_auth_type' => 'off'
                ]);
            }

            if (!$user->hasVerifiedEmail()) {
                $user->markEmailAsVerified();
            }

            auth()->loginUsingId($user->id);

            return $this->loggedin($request, $user) ?: redirect('/');
        } catch (\Exception $e) {
            alert()->error('ورود ناموفق بود...');

            return $this->redirect('/');
        }
    }

}
