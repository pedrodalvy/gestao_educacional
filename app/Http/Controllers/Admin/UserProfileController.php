<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserProfileRequest;
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
        $this->validateProfile($request);

        $user->profile->address
            ? $user->profile->update($request->all())
            : $user->profile()->create($request->all());

        toastr('success', 'Perfil atualizado com sucesso');
        return back();
    }

    protected function validateProfile(Request $request)
    {
        $rules = [
            'address' => 'required|string',
            'cep' => 'required|string|max:8',
            'number' => 'required|numeric',
            'complement' => 'nullable|string',
            'neighborhood' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string|max:2',
        ];

        return $request->validate($rules);
    }
}
