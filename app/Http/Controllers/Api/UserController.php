<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function getAllUsers(): UserCollection
    {
        return new UserCollection(User::query()->cursorPaginate(3));
    }

    public function getUser($id): UserResource
    {
        return new UserResource(User::query()->findOrFail($id));
    }

    public function deleteUser($id)
    {
        if (User::query()->findOrFail($id)->delete()) {
            return ['message' => 'Successfully deleted user.'];
        }
        return ['error' => 'Something went wrong.'];
    }

    public function editUser(UserUpdateRequest $request, $id, UserService $userService)
    {
        $valid = $request->validated();
        if ($userService->editUser($valid, $id)) {
            return ['message' => 'Successfully edited user'];
        }
        return ['error' => 'Something went wrong.'];
    }

}
