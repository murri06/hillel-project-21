<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers()
    {
        return new UserCollection(User::all());
    }

    public function getUser(Request $request)
    {
        return new UserResource(User::query()->findOrFail($request->input('id')));
    }
}
