<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public function editUser($valid, $id)
    {
        return User::query()->findOrFail($id)->update([
            'name' => $valid['name'],
            'email' => $valid['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($valid['password']),
        ]);
    }

    public function createUser($valid)
    {
        $user = User::create([
            'name' => $valid['name'],
            'email' => $valid['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($valid['password']),
            'remember_token' => Str::random(10),
        ]);
        return $user->save();
    }
}
