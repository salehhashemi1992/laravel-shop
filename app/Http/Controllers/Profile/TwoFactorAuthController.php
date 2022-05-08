<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\ActivationCode;
use App\Notifications\ActivationCodeNotification;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TwoFactorAuthController extends Controller
{
    public function two_factor_auth()
    {
        return view('profile.two-factor-auth');
    }

    public function manage_two_factor_auth(Request $request)
    {
        $data = $this->validateRequest($request);

        if ($data['type'] == 'phone') {

            if ($request->user()->phone_number !== $data['phone_number']) {
                return $this->codeHandler($request, $data['phone_number']);
            } else {
                $request->user()->update([
                    'two_factor_auth_type' => 'phone'
                ]);
            }
        }

        if ($data['type'] == 'off') {
            $request->user()->update([
                'two_factor_auth_type' => 'off'
            ]);
        }

        return back();
    }

    /**
     * @param Request $request
     * @return array
     */
    private function validateRequest(Request $request): array
    {
        $data = $request->validate([
            'type' => 'required|in:phone,off',
            'phone_number' => 'required_unless:type,off', Rule::unique('users', 'phone_number')->ignore($request->user()->id)
        ]);
        return $data;
    }

    /**
     * @param Request $request
     * @param $phone_number
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function codeHandler(Request $request, $phone_number)
    {
        $token = ActivationCode::tokenGenerate($request->user());

        $request->session()->flash('phone_number', $phone_number);

        $request->user()->notify(new ActivationCodeNotification($token, $phone_number));

        return redirect(route('profile.phone_verify'));
    }

}
