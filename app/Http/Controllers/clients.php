<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clients extends Controller
{
    public function create(Request $request)
    {
      $validatedData = $request->validate([
        'first_name' => 'required|max:255',
        'middle_name' => 'max:255',
        'last_name' => 'required|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'password_confirmation' => 'required|min:8|same:password',
      ]);
      return $request;
    }
}
