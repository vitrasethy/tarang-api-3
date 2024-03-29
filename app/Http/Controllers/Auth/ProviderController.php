<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect(string $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(string $provider)
    {
        $providerUser = Socialite::driver($provider)->user();

        $user = User::updateOrCreate([
            'provider_id' => $providerUser->id,
        ], [
            'name' => $providerUser->name,
            'provider_token' => $providerUser->token,
        ]);

        Auth::login($user);

        return redirect()->away('http://localhost:5173');
    }
}
