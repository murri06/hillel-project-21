<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{

    public function list(): View
    {
        return view('users.list', [
            'users' => User::query()->cursorPaginate(10),
        ]);
    }

    public function details($id): View
    {
        $user = User::query()->findOrFail($id);
        return view('users.details', [
            'user' => $user,
            'events' => $user->events,
        ]);
    }

    public function addUser(Request $request, UserService $userService): RedirectResponse
    {
        $valid = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:App\Models\User,email'],
            'password' => ['required', 'min:6'],
        ]);

        $userService->createUser($valid);
        return to_route('users_list');
    }

    public function editUserForm($id): View
    {
        return view('users.create', [
            'user' => User::query()->findOrFail($id),
        ]);
    }

    public function editUser(UserUpdateRequest $request, $id, UserService $userService): RedirectResponse
    {
        $valid = $request->validated();
        $userService->editUser($valid, $id);
        return to_route('users_list');
    }

    public function deleteUser($id): RedirectResponse
    {
        $user = User::query()->findOrFail($id);
        $user->delete();
        return to_route('users_list');
    }
}
