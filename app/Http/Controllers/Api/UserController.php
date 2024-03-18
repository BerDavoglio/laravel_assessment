<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Mail\MyMail;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            abort(401);
        }

        $users = User::all();
        return view('users.list', ['users' => $users]);
    }

    public function logout(Request $request)
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function index()
    {
        return view('users.index');
    }

    public function register()
    {
        return view('users.register');
    }

    public function list()
    {
        $users = User::all();
        return view('users.list', ['users' => $users]);
    }

    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $credentials = $request->only(['name', 'email', 'password']);

        if (!$credentials) {
            abort(401);
        }
        ;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $data = [
            'name' => 'Laravel Assessment',
            'message' => 'Welcome to Laravel Assessment! This is an automatic email!'
        ];

        Mail::to($request->email)->send(new MyMail($data));

        return redirect(route('user.list'))->with('success', 'User Updated');
    }

    public function update(Request $request, User $user)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);

            $request->image = $imageName;

        } else {
            return back()->with('error', 'No image file uploaded');
        }

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $data = $data + array('image' => $imageName);
        $user->update($data);

        return redirect(route('user.list'))->with('success', 'User Updated');

    }

    public function destroy(User $user)
    {
        $user = User::find($user->id);
        $user->delete();

        return redirect(route('user.list'))->with('success', 'User Deleted');
    }
}
