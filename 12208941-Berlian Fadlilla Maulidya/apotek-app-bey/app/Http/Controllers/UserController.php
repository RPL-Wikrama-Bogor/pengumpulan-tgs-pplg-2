<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = user::all();
        return view('user.index', compact('user'));
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
            'nama' => 'required|min:3',
            'email' => 'required',
            'role' => 'required',
        ]);

        user::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'password' => bcrypt(substr('nama', 0, 3) . substr('email', 0, 3)),
            
        ]);

        // atau jika seluruh data input akan dimasukkan langsung ke db bisa dengan perintah Akun::create($request->all());

        return redirect()->back()->with('success', 'Berhasil menambahkan data Akun!');
    
    }

    /**
     * Display the specified resource.
     */
    public function kelola(user $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = user::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|min:3',
            'email' => 'required',
            'role' => 'required'
        ]);

        if($request->password){

        user::where('id', $id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role,
            'password' =>  bcrypt($request->password),
        ]);}else{
            user::where('id', $id)->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'role' => $request->role,
            ]);
            }


        return redirect()->route('user.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        user::where('id', $request->id)->delete();

        return response()->json("berhasil", 200);
    }

   public function hapus($id){

    $user = user::find($id);

    return response()->json( $user);
   }
}