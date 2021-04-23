<?php

namespace App\Http\Controllers;

use App\Services\SocialService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function init()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function initFb()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialService $service)
    {
        $user = Socialite::driver('vkontakte')->user();
        $service->userLogin($user);

        return redirect()->route('admin.news.index');
    }

    public function callbackFb(SocialService $service)
    {
        $user = Socialite::driver('facebook')->user();
        $service->userLogin($user);

        return redirect()->route('admin.news.index');
    }
}
