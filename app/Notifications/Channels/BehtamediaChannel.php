<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class BehtamediaChannel
{
    public function send($notifiable, Notification $notification)
    {
        $data = $notification->toBehtamedia($notifiable);
        $text = $data['text'];
        $number = $data['phone_number'];

        try {
            $url = 'http://panel.behtamedia.ir/webservice/server';
            $param = [
                'Action' => 'Send',
                'username' => env('BEHTAMEDIA_USERNAME'),
                'password' => env('BEHTAMEDIA_PASSWORD'),
                'type' => 1,
                'from' => '985000988',
                'text' => $text,
                'receivers' => $number,
                'file' => 0
            ];

            $handler = curl_init($url);
            curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
            $Response = json_decode(curl_exec($handler));
            dd($Response);
            $ResponseCode = $Response->Result;
            if ($ResponseCode == 1) {
                //
            } else {
                alert()->error('مشکلی در ارسال پیامک بوجود آمده است.');
                debugbar()->error($Response);
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

}
