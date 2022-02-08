<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();

        auth()->login(User::create($validated));

        return redirect('/')->with('success', 'Your account has been created.'); //flash message
    }
}
