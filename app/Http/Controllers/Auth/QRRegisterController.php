<?php

// app/Http/Controllers/Auth/QRRegisterController.php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRRegisterController extends Controller
{
    public function showForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $token = Str::uuid();

        $user = User::create([
            'name' => $request->name,
            'qr_token' => $token,
        ]);

        return view('show-qr', [
            'user' => $user,
            'qr' => QrCode::size(200)->generate($token),
        ]);
    }
}

