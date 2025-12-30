<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
            // "_token" => "OjxoHqcWd0bn4AFLzWvnW6d2rMXiQ7XzdZUNW4sb"
            // "name" => "Test1"
            // "email" => "test1@local.com"
            // "password" => "test123"
            // "password_confirmation" => "test123"

        $request->validate([
            'name' => ['required',],
            'email' => ['required','unique:'.User::class],
            'password' => ['required'],
            'password_confirmation' => ['required','same:password'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
