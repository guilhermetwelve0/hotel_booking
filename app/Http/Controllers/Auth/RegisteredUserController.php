<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;

use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function index()
    {
        $users = User::orderBy('created_at')->get();
        return view('setting.user.index', compact('users'));
    }
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        // return view('auth.register');
        return view('setting.user.create-edit');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);

        return redirect()->route('setting.user.index');
    }

    public function edit(User $user)
    {
        return view('setting.user.create-edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);

        return redirect()->route('setting.user.index');
    }
}
