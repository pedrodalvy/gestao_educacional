<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function edit(User $user)
    {
        return view('admin.users.profile.edit')
            ->with('user', $user);
    }

    public function update(User $user, Request $request)
    {
        $user->profile->address
            ? $user->profile->update($request->all())
            : $user->profile()->create($request->all());

        toastr('success', 'Perfil atualizado com sucesso');
        return back();
    }
}
