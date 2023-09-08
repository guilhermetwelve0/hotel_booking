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
        return view('auth.register');
        return view('setting.user.create-edit');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRequest $request)
    {
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

         Auth::login($user);

         return redirect(RouteServiceProvider::HOME);

        return redirect()->route('setting.user.index')->with('success', 'New Admin User Successfully Created!');
    }

    public function edit(User $user)
    {
        return view('setting.user.create-edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        try{
            $validated = $request->validated();
            $user->update($validated);
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('setting.user.index')->with('success', 'Admin User Info Updated Successfully!');
    }

    public function destroy(User $user)
    {
        try{
            $user->delete();
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong!');
        }

        return redirect()->route('setting.user.index')->with('success', 'Admin User Successfully Deleted!');
    }
}
