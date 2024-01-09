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

    //  karena function diakses detelah login maka diatmabahkan request
     public function authLogin(Request $request){
        $request->validate([
            // email dns digunakan untuk mengecek user apakah memeiliki alamt google,yahoo dll yang bersifat dns
            'email' => 'required|email:dns',
            'password' => 'required',
        
        ]);
        // simpan data dari dalam email dan password ke dalam variabel untuk memudahkan panggilan 
        $user = $request->only(['email','password']);
        // mengecek kecocokkan email dan password kemudian menyimopannya d dalam class beranama auth(memberi didentitas data riwayat login ke project)
        if(Auth::attempt($user)){
            return redirect('/dashboard');
            // perbedaan redirecxt dan route 
        }else{
            return redirect()->back()->with('failed','Login gagal! silakan coba lagi');
        }
     }

    public function logout(){
        // menghapus atau menghilangkan data session login 
        Auth::logout();
        return redirect()->route('login');
    }
    public function index()
    {
        //proses ambil data
        $users = User::orderBy('name','ASC')->simplePaginate(5);
        // mannggil html yang ada di folder resources/views/user.index.blade.php
        //compact : mengirim data ke blade 
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
    public function user_data(Request $request)
    {
        //
        
        // validasi
        // 'name_input' => 'validasi1/validasi2'

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            
        ]);
        $namaku=substr($request->name,0,3);
        $emailku=substr($request->email,0,3);
        $pw=hash::make($namaku.$emailku);
        // $pw=password_hash('',$request->password);
        // simpan data ke db : 'nama_column' => $request->name_input
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $pw,
            'role' => $request->role,
        ]);

        // abis simpen, arahin ke halaman mana
        return redirect()->back()->with('success', 'berhasil menambahkan data obat!');
    
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $user =User::find($id);
        // mengembalikan bentuk json dikirim data yang diambil dari response status code 200
        // response status code api :
        // 200 -> success/ok
        // 400 an -> errror kode/validasi input
        // 419 ->error token csrf
        // 500 an -> error server hosting
        return response()->json($user,200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
         // mengambil data yang belum dimunculkan
        // find: mencari berdasarkan column
        // bisa jkuga : where ('id',$id)->first()
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        // validasi
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
            'password' => '',
        ]);
        $pw=password_hash($request->password,PASSWORD_DEFAULT);

        // cari berdasarkan id terus update
        User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $pw,
        ]);
        // redirect ke html user data
        // route digunakan untuk memindahkan suatu ke page yang lain jika ingin menambahkan notif ke tempat lain bisa di ganti ke medicine.tambah atau medicine.edit
        return redirect()->route('user.data')->with('success','Berhasil mengubah data obat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        User::where('id',$id)->delete();
        return redirect()->back()->with('deleted','Berhasil menghapus data!');
    }
}
