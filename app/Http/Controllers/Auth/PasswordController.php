<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'current_password'=>'required|current_password',
            'password'=>'required|confirmed',
        ],
        [
            'current_password.required'=>'Sila masukkan katalaluan sedia ada',
            'current_password.current_password'=>'Katalaluan sedi ada tidak tepat',
            'password.required'=>'Sila masukkan katalaluan baharu',
            'password.confirmed'=>'Sila sahkan katalaluan baharu',
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/projek/senarai')->with(['success'=>'Rekod berjaya dikemaskini']);
    }
}
