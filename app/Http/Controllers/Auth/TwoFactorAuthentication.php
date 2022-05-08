<?php

namespace App\Http\Controllers\Auth;

use App\Models\ActivationCode;
use App\Models\User;
use App\Notifications\ActivationCodeNotification;
use App\Notifications\LoginNotification;
use Illuminate\Http\Request;

trait TwoFactorAuthentication
{
    public function loggendin(Request $request, User $user)
    {
        if ($user->isActiveTwoFactor()) {
            $this->loginThenRedirectToTokenPage($request, $user);
        }
        $user->notify(new LoginNotification());
        return false;
    }

    protected function loginThenRedirectToTokenPage(Request $request, User $user)
    {
        auth()->logout();

        $info = [
            'user_id' => $user->id,
            'using_phone' => false,
            'remember' => $request->has('remember')
        ];
        $request->session()->flash('auth', $info);

        if ($user->isPhoneAuthenticationEnabled()) {
            $token = ActivationCode::tokenGenerate($user);

            $user->notify(new ActivationCodeNotification($token, $user->phone_number));

            $request->session()->push('auth.using_phone', true);
        }
        return redirect(route('auth.token_check'));
    }
}
