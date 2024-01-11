<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //perlu ditambahkan parameter request jika menggunakan post dan patch pada route = untuk mengsmbil data yang diinput user
    public function authLogin(Request $request)
    {
        $request -> validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        // simpan data dari inputan email dan password ke dlm variable untuk memudahkan ;pemanggilannya
        $user = $request->only(['email', 'password']);
        // attempt : menegecek kecocokan email dan password kemudian meniympannya ke dlm class auth (memberi identitas data riwayat login ke projectnya)
        if (auth::attempt($user)) {
            //perbedaan redirect() = (disamain dengan yang ada di path) dan redirect()->route = (tulisan yang ada di dalam route disamain sama iddalam naem)
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('failed', 'Login Gagal! Silahkan coba lagi!');
        }
    }

    public function logout() {
        // menghapus data session login
        Auth::logout();
        return redirect()->route('login');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
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
            'email' => 'required|min:3',
            'role' => 'required',
        ]);

        $emailPrefix = substr($request->email, 0, 3);
        $namePrefix = substr($request->name, 0, 3);
        $password = $emailPrefix . $namePrefix;
            
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => $request->role,
        ]);

        return redirect()->route('user.home')->with('success', 'Berhasil menambahkan data pengguna!');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|min:3',
            'role' => 'required',
        ]);

        $userData = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,  
        ];

        if($request->filled('password')){
            $userData['password'] = bcrypt($request->password);
        }

        User::where('id', $id)->update($userData);

        return redirect()->route('user.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

}
