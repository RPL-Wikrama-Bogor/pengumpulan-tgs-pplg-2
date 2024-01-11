<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Hash;
use Illuminate\support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->simplePaginate(5);
        //manggil html
        return view('User.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi

        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);
    

    User::create([
        'name' => $request->name,
        'type' => $request->type,
        'price' => $request->price,
        'stock' => $request->stock,
    ]);

    return redirect()->back()->with('success', 'Berhasil menambahkan Data Obat!');
}
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       $User = User::find($id);
    // mengembalikan bentuk json dikirim data y diambil dengan response status code 200
        // response status code api :
        // 200 -> success/ok
        // 400 an -> error kode/validasi input user
        // 419 -> error token csrf
        // 500 an -> error server hosting
       return response()->json($User, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $User = User::find($id);

        return view('User.edit', compact('User'));
    }

    
    public function update(Request $request, $id)
    {
        //validasi
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);
        User::where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);
        return redirect()->route('User.data')->with('success', 'Berhasil Mengubah Data Obat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        User::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!' );
    }

    public function stockData()
    {
        $users = User::orderBy('stock', 'ASC')->simplePaginate(5);
        return view('User.stock', compact('users'));
    }   

    public function updatestock(Request $request, $id)
    {
        $request->validate([
            'stock' => 'required|numeric',
        ]);
        $UserBefore = User::where('id', $id)->first();
        if ($request ->stock <= $UserBefore['stock']){
            return response()->json(['message'=>'stock tidak boleh kurang/sama dengan stock sebelumnya!'],400);
        }
        $UserBefore->update(['stock' => $request->stock]);
        return response()->json('berhasil',200);
    }

    public function authLogin(request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);
       //simpan data dr inputan email dan password ke dlm variable untuk
       //memudahkan pemanggilannya
       $user = $request->only(['email','password']);
       //attempt : mengecek kecocokan email dan password kemudian menyimpan ke dlm class
       //auth(memberi identitas data riwayat login ke projectnya)
       if(auth::attempt($user)){
        //perbedaan redirect() dan redirect()->route?? redirect() ->patch. 
         return redirect('/dashboard');
       }else{
        return redirect()->back()->with('failed','login gagal! silahkan coba lagi');
       }
    }

    public function logout()
    {
        //menghapus/menghilangkan data session login
        Auth::logout();
        return redirect()->route('login');
    }
}