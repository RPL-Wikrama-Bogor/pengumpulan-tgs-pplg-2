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
     *
     * @return \Illuminate\Http\Response
     */

    //Request $requestb -> mengambil data yang di input user
    public function authLogin(Request $request){

        $request->validate([
            'email' => 'required|email:dns', // 'email' di amnbil dari name yang berada di login.blade.php
            'password' => 'required' // 
        ]);

        // simpan daya dari inputan email dan password ke dalama variabel untuk memudahkan pemanggilan nya
        $user = $request->only(['email', 'password']);

        // attemt : mengecek kecocokan email dan password kemudian menyimpan ke dalam 
        if (Auth::attempt($user)) {
            
            return redirect('/dashboard');
        } else {
            return redirect()->back()->with('failed', 'Login gagal silahkan coba lagi');
        }

    }


    public function logout(){
        // menghapus/menghilangkan data session login

        Auth::logout();
        return redirect()->route('login');
    }

    public function index()
    {

        //proses ambil data
        $users = User::orderBy('name', 'ASC')->simplePaginate(5);
        // manggil html yabg ada di folder resources/views/user/index.blade.php
        // compact : mengirim data ke blade
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            // 'password' => 'required|min:5',
            'role' => 'required',

        ]);


            // Mendapatkan 3 karakter awal dari email dan nama
        $emailPrefix = substr($request->email, 0, 3);
        $namePrefix = substr($request->name, 0, 3);

        // Menggabungkan kedua prefix menjadi password
        $password = $emailPrefix . $namePrefix;


        // simpan data ke db : 'nama_column' => $request->name_input
        User::create([ //user ini disamain sama nama model nya

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => $request->role,
            //yang ada didalam '' itu disamain sama yang di migration dan yang sesudah -> itu di sesuain sama yang ada di name input

        ]);


        return redirect()->back()->with('success', 'Berhasil menambahkan data obat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MOdels\User $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     //validasi

     $request->validate([
        'name' => 'required|min:3',
        'email' => 'required',
        'role' => 'required',
        'password' => 'required|min:5',
    ]);

    User::where('id', $id)->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => $request->password,
    ]);

    // redirect ke halaman user data
    return redirect()->route('user.data')->with('success', 'Berhasil mengubah data obat!');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
    
}
