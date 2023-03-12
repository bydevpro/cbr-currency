<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRegistration extends Controller
{
    //
    public function registrator(Request $request){
        $validateFields = $request-> validate([
            'name' => 'required|min:3',
            'email'=> 'required|unique:users|email',
            'password' => 'required|min:6|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/',
        ]);
        if(User::where('email', $validateFields['email'])->exists()){
            redirect(route('user.login'))->withErrors([
                'email' => 'Этот е-мэйл занят.'
            ]);
        }
        $validateFields['password'] = Hash::make($validateFields['password']);
        $user = User::create($validateFields);
        if($user){
            Auth::login($user);
            
                return redirect()->to(route('index'));
        }
        return redirect(route('user.login'))->withErrors([
            'formError' => 'Произошла ошибка при сохранении'
        ]);
    }
}
