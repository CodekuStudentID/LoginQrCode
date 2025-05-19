<?php

// app/Http/Controllers/Auth/QRLoginController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class QRLoginController extends Controller
{
    public function showForm()
    {
        return view('login-qr');
    }

    public function login(Request $request)
    {
        $request->validate([
            'qr_token' => 'required|string',
        ]);

        $user = User::where('qr_token', $request->qr_token)->first();

        if ($user) {
            Auth::login($user);
            return redirect('/dashboard');
        }

        return back()->withErrors(['qr_token' => 'QR Code tidak valid']);
    }
}

