<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function DisplayLoginPage() { return view('login'); }
    public function DisplayRegisterPage() { return view('register'); }


    public function LoginToAccount(Request $req)
    {
        $user = User::where(['email' => $req->email])->first();

        if($user && Hash::check($req->password, $user->password))
        {
            // Set user details in session
            $req->session()->put('user', $user);
            return redirect('/products');
        }
        else
        {
            echo "Nume sau parola gresita<br/>";
            echo '<a href = "/login">Apasa aici</a> pentru a incerca din nou.';
        }
    }

    public function CreateAccount(Request $req)
    {
        $user = User::where(['email' => $req->email])->first();
        if($user)
        {
            echo "Adresa de email a fost deja folosita!<br/>";
            echo '<a href = "/register">Click aici</a> pentru a incerca din nou';

            return;
        }

        $formData = $req->validate(
            [
                'name' => ['required', 'min:3'],
                'email' => ['required', 'email'],
                'password' => ['required']
            ]
        );

        // Hash password
        $formData['password'] = Hash::make($formData['password']);

        // Create user
        $user = User::create($formData);

        // Login to account directly after registration
        // Set user details in session
        session()->put('user', $user);

        return redirect('/products');
    }

    public function Logout()
    {
        session()->flush();

        return redirect('/login');
    }

}
