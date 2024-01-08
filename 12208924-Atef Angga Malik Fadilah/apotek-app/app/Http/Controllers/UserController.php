<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;    
use Illuminate\Support\Facades\Auth;    

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
            'name' => 'required|min:3',
            'email' => 'required|min:11',
            'role' => 'required'
        ]);

        // Ambil tiga karakter pertama dari nama dan email
        $namaUser = substr($request->name, 0, 3);
        $emailUser = substr($request->email, 0, 3);

        // Gabungkan tiga karakter pertama dari nama dan email sebagai password default
        $defaultPassword = Hash::make($namaUser . $emailUser);

        // Buat pengguna baru dengan data yang valid
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $defaultPassword
        ]);
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data Pengguna!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        // mengembalikan bentuk json dikirim data yang diambil dengan response status code 200
        // response status code api :
        // 200 -> success

        return response()->json($user, 200);
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:11',
            'role' => 'required',
            'password' => 'required'
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
        ]);

        return redirect()->route('user.data')->with('success', 'Berhasil Mengubah Data Pengguna!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // cari dan hapus data
        User::where('id', $id)->delete();
        return redirect()->back()->with('delete', 'Berhasil Menghapus Data Pengguna');
    }
    
    public function authLogin (request $request) {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
        // simpan data dari inputan email dan password ke dalam variable untuk memudahkan pemanggilnya
        $user = $request->only(['email', 'password']);
        // attempt : mengecek kecocokan email dan password kemudian menyimpan nya ke dalam class Auth 
        // (Memberi identitas data riwayat login ke projectnya)
        if (Auth::attempt($user)) {
            // perbedaan redirect() dan redirect()->route ?
            return redirect('/dashboard'); 
            // memanggil lewat path /
        } else {
            return redirect()->back()->with('failed', 'Login gagal! silahkan coba lagi');
        } // memanggil lewat name
    }

    public function logout(){
        // menghapus atau menghilangkan data session login
        Auth::logout();
        return redirect()->route('login'); 
    }
}