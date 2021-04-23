<?php


namespace App\Services;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User;

class SocialService
{
    public function userLogin(User $user)
    {
        $email = $user->getEmail();
        $userData = UserModel::where('email', $email)->first();

        if($userData)
        {   $userData->fill([
            'name' => $user->getName(),
            'avatar' => $user->getAvatar()
        ])->save();
            Auth::loginUsingId($userData->id);
        }
    }
}
