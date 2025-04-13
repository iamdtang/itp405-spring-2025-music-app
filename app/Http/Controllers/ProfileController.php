<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index', [
            'user' => Auth::user(),
        ]);
    }

    public function createToken(Request $request)
    {
        $token = Auth::user()->createToken($request->token_name);

        return redirect()->route('profile.index')->with('plainTextToken', $token->plainTextToken);
    }

    public function revokeToken($tokenId)
    {
        // notice it is tokens() and not tokens
        Auth::user()->tokens()->where('id', $tokenId)->delete();

        return redirect()->route('profile.index');
    }
}
