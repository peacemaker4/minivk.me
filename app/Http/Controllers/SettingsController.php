<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    function index()
    {
        return view('pages.user.settings');
    }

    function password(SettingsRequest $request)
    {
        $data = $request->validated();

        $user = auth()->user();
        $user->update([
            'password' => \Hash::make($data['password'])
        ]);

        return back()->with('password_changed', true);
    }
}
