<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service)
    {
//        $facebookUser = Socialite::driver('facebook')->stateless()->user();
//        print_r($facebookUser);

        $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());
        auth()->login($user);
        return redirect()->to('/home');
    }
}
