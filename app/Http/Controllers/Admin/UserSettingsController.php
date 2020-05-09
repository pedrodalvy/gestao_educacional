<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserSettingsController extends Controller
{
    public function edit()
    {
        return view('admin.users.settings');
    }

    public function update(Request $request)
    {
        $this->validatePassword($request);

        $user = User::findOrFail(Auth::user()->id);
        $user->password = \Hash::make($request->password);

        if ($user->save()) {
            toastr('success', 'Perfil atualizado com sucesso');
            return back();
        }

        toastr('error', 'Não foi possível atualizar o perfil');
        return back();
    }

    protected function validatePassword(Request $request)
    {
        $rules = [
            'password' => 'required|min:6|max:16|confirmed'
        ];

        return $request->validate($rules);
    }
}
