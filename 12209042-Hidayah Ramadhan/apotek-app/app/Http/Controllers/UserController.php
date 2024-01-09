<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->simplePaginate(5);
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:225',
            'email' => 'required',
            'role' => 'required',
        ]);

        $email = substr($request->email, 0, 3);
        $name = substr($request->name, 0, 3);

        $hashedPassword = Hash::make($email . $name);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $hashedPassword
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data pengguna!');
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
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',
        ]);

           //cari berdasarkan id, terus update
           User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password'=> $request->password,
        ]);

        return redirect()->route('user.data')->with('success', 'Berhasil edit data pengguna!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        user::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

    public function authLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // simpan data dari inputan email dan password ke dlm variable untuk memudahkan pemanggilan
        $user = $request->only(['email','password']);
        //attempt : mengecek kecocokan email dan password kemudian menyimpannya ke dlm class Auth (memberi identitas)
        if (Auth::attempt($user)) {
            //perbedaan redirect()->path dan redirect()->route->name
            return redirect('/dashboard');
        }else {
            return redirect()->back()->with('failed','Login gagal silahkan coba lagi');
        }
    }
    public function logout()
    {
    //menghapus/menghilangkan data session login
    Auth::logout();
    return redirect()->route('login');
    }
}
