<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ActivationCode;
use App\Models\User;
use App\Notifications\LoginNotification;
use Illuminate\Http\Request;

class AuthTokenController extends Controller
{
    public function getToken(Request $request)
    {
        if (!$request->session()->has('auth')) {
            alert()->error('دسترسی نامناسب');
            return redirect(route('login'));
        }

        $request->session()->reflash();

        return view('auth.token-verify');
    }

    public function manageToken(Request $request)
    {
        $request->validate([
            'token' => 'required'
        ]);

        if (!$request->session()->has('auth')) {
            alert()->error('دسترسی نامناسب');
            return redirect(route('login'));
        }

        $user = User::findOrFail($request->session()->get('auth.user_id'));

        $result = ActivationCode::tokenConfirm($request->token, $user);

        if (!$result) {
            alert()->error('توکن وارد شده صحیح نیست.');
            return redirect(route('login'));
        }

        if (auth()->loginUsingId($user->id, $request->session()->get('remember'))) {
            auth()->user()->activationCode()->delete();
            alert()->success('ورود شما با موفقیت انجام شد.');
            $user->notify(new LoginNotification());
            return redirect('/');
        };

        return redirect(route('login'));
    }
}
