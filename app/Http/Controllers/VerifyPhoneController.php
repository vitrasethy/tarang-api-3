<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class VerifyPhoneController extends Controller
{
    public function __invoke(Request $request, User $user)
    {
        $request->validate([
            'code' => 'required|numeric|max_digits:6|min_digits:6'
        ]);

        if ($user->code !== $request->code) {
            throw ValidationException::withMessages([
                'code' => 'Incorrect code',
            ]);
        }

        Auth::login($user);

        return response()->noContent();
    }
}
