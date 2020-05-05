<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::paginate(10);

        return view('admin.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUsersRequest $request
     * @return RedirectResponse|Response
     */
    public function store(StoreUsersRequest $request)
    {
        /** @var StoreUsersRequest $request */
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make('123456')
        ]);

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|Response|View
     */
    public function edit(User $user)
    {
        return view('admin.users.edit')
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUsersRequest $request
     * @param User $user
     * @return RedirectResponse|Response
     */
    public function update(UpdateUsersRequest $request, User $user)
    {
        $user->fill($request->all())->save();

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        //
    }
}
