<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateForm(Authenticatable $user)
    {
        return view('auth.update', [
            'user' => $user
        ]);
    }

    /**
     *
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Authenticatable $user, UpdateUserRequest $request)
    {
        $user->update($request->toArray());
        return redirect()->back()->with('status', 'User was updated.');
    }

    /**
     *
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete(Authenticatable $user)
    {
        Auth::logout();
        $user->delete();
        return redirect()->back()->with('status', 'User was deleted.');
    }
}
