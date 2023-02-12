<?php

namespace App\Http\Controllers\profile;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('profile.profile');
    }

    public function update(UpdateProfileRequest $request)
    {
        /* $request->validate([
            'name' => 'required|unique:users|min:4|max:15|string|regex:/^[a-zA-Z0-9]+$/',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|min:8|max:11',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => now()
        ]);

        return redirect()->route('profile.points')->with('message', 'успешно'); */

        $user = auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'updated_at' => now()
        ]);

        session()->flash('success', 'Обновлено успешно');

        return redirect()->back();
    }

    public function edit()
    {
        return view('profile.edit')->with('user', auth()->user());
    }
}
