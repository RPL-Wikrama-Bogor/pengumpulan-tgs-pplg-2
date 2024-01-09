<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function authLogin(Request $request) {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // simpan data dari inputan email dan password kedalam variabel untuk memudahkan pemanggilan
        $user = $request->only(['email', 'password']);

        // attempt: mengecek kecocokan email dan password kemudian menyimpannya ke dalam
        // class Auth (memberi identitas data riwayat login ke projectnya)
        if (Auth::attempt($user)) {
            // perbedaan redirect() dan redirect()->route ?? redirect() 
            return redirect('/dashboard');
        }else {
            return redirect()->back()->with('failed', 'login gagal coba lagi');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function index()
    {
        $users = User::orderBy('name', 'ASC')->simplePaginate(5);
        //memanggil html yang ada di folder resources/views/medicine/index.blade.php
        // manggil html yang ada di folder resource/views/medicines/index.blade.php
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
            'name' => 'required|min:3',
            'email' => 'required|email',
            // 'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->name,
        ]);

        return redirect()->back()->with('success','done gk bang?donee!!!!!');
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
            'email' => '',
            'role' => 'required',
            'password' => 'required',
        ]);

        //cari berdasarkan id, terus update
        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
        ]);

        return redirect()->route('user.data')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //cari dan hapus data
        User::where('id', $id)->delete();
        return redirect()->back()->with( 'deleted', 'Data berhasil dihapus' );
    }
}
