<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function view() {
        return view('auth.register');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:5'],
            'profile_picture' => ['required', 'mimes:png,jpeg,jpg']
        ]);
        $file = $request->file('profile_picture');
        $file_name = "p-" . microtime(true) . "." . $file->extension();
        $is_user_created = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_picture' => $file_name,
            'user_type' => 'Admin'

        ]);
        if($is_user_created) {
            $is_file_uploaded = $file->move(public_path('uploads'), $file_name);
            if($is_file_uploaded) {
                return back()->with('success', 'Hamari Sabzi sai ho gai');
            } else {
                return back()->with('failed', 'Hamari File Shareef Kharab ho gai');
            }
        } else {
            return back()->with('failed', 'Hamari Sabzi Kharab ho gai');
        }
    }
}
