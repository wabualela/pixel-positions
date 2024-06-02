<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate the request
        $userValidatedAttributes     = $request->validate([ 
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        $employerValidatedAttributes = $request->validate([ 
            'employer' => 'required|string|max:255',
            'logo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user     = User::create($userValidatedAttributes);
        $logoPath = $request->logo->store('logos', 'public');
        
        $user->employer()->create([ 
            'name' => $employerValidatedAttributes['employer'],
            'logo' => $logoPath,

        ]);

        Auth::login($user);

        return redirect()->route('home');
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
