<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\ActivationCode;
use App\Models\User;
use Illuminate\Http\Request;
use UxWeb\SweetAlert\SweetAlert;

class TokenAuthController extends Controller
{
    public function confirm_phone(Request $request)
    {
        if (!$request->session()->has('phone_number')) {
            return redirect(route('profile.two_factor'));
        }

        $request->session()->reflash();

        return view('profile.phone-verify');
    }

    /**
     * @var $user User
     */
    public function manage_confirm_phone(Request $request)
    {
        $this->validateRequest($request);

        $result = ActivationCode::tokenConfirm($request->token, $request->user());

        if ($result) {
            $request->user()->activationCode()->delete();
            $request->user()->update([
                'two_factor_auth_type' => 'phone',
                'phone_number' => $request->session()->get('phone_number')
            ]);
            SweetAlert::message('Robots are working!');

            alert()->success('.شماره تماس شما با موفقیت در سیستم ثبت شد', 'عملیات موفقیت آمیز بود');
        } else {
            alert()->error('کد ارسالی شما صحیح نیست', 'عملیات ناموفق بود.');
        }

        return redirect(route('profile.two_factor_manage'));
    }

    /**
     * @param Request $request
     * @return void
     */
    private function validateRequest(Request $request): void
    {
        $request->validate([
            'token' => 'required'
        ]);
    }
}
