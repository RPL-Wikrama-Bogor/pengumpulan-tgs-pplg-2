<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class GuruController extends Controller
{
    public function store(Request $request){

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique|',
            'password' => 'required',
            'role' => 'required',
        ]);


        Guru::create([
            'name' => 'name',
            'email' => 'email',
            'password' => 'password',
            'role' => 'role',
        ]);

    }
}
