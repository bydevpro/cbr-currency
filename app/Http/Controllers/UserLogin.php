<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserLogin extends Controller
{
    //
    public function login(Request $request) 
    {
        $formFields = $request->only(['email', 'password']);
        $user = User::where('email', $request->email)->first();
    
        if (! $user) {
            return redirect(route('login'))->withErrors([
                'password' => 'Ошибка! Пользователь не найден'
            ]);
        } 
        if (Auth::attempt($formFields)) {
            return redirect(route('index'));
        }
        return redirect(route('login'))->withErrors([
            'password' => 'Ошибка!Проверьте данные и повторите ввод.'
        ]);
        
    
        
     
    }
}
