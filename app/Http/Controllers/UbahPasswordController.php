<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UbahPasswordController extends Controller
{
    public function up_password(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
            'new_password' => 'required|min:6|confirmed',
        ]);

        $dataToUpdate = [
            'password' => bcrypt($request->input('new_password')),
        ];

        $user->update($dataToUpdate);

        return redirect('ubahpassword')->with('success', 'Password Berhasil Diubah!');
    }
}