<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // proses ambil data
        $medicines = Medicine::orderBy('name', 'ASC')->simplePaginate(5);
        // manggil html yg ada di folder resourse/views/medicine/index.blade.php
        // compact : mengirim data ke blade
        return view('medicine.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    // untuk mengambil data yang diinput user
    // validasi biar user mengisi data dengan benar

    {
        // validasi
        // 'name_input' => 'validasi1/validasi2'
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        // simpan data ke db : 'nama_column' => $request->name_input
        Medicine::create([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        // abis simpen, arahin ke halaman mana
        return redirect()->back()->with('succes', 'berhasil menambahkan data obat!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $medicine = Medicine::find($id);
        // mengembalikan bentuk json dikirim data y diambil dengan response status code 200
        // response status code api :
        // 200 -> success/ok
        // 400 an -> error kode/validasi input user
        // 419 -> error token csrf
        // 500 an -> error server hosting
        return response()->json($medicine, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //mebgambil data yg akan dimunculkan
        // find : Mencari berdasarkan column id
        // bisa juga : where('id', $id)->first()
        $medicine = Medicine::find($id);

        return view('medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //validasi
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);
        // carai berdasarkan id, trs update
        Medicine::where('id', $id)->update
        ([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,    
        ]);
        //redirect ke hlmn data 
        return redirect()->route('medicine.data')->with('success', 'data berhasil mengubah obat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // cari dan hapus data
        Medicine::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'berhasil menghapus data!');
    }

    public function stockData()
    {
        $medicines = Medicine::orderBy('stock', 'ASC')->simplePaginate(5);
        return view('medicine.stock', compact('medicines'));
    }

    public function updateStock(Request $request, $id)
    {
        // validasi input
        $request->validate([
            'stock' => 'required|numeric',
        ], [
            'stock.required' => 'Input stock harus diisi!',
        ]);
        // ambil dala sblm update, untuk dibandingkan
        $medicineBefore = Medicine::where('id', $id)->first();
        if ($request->stock <= $medicineBefore['stock']) {
            // jika stock yg diinput <= stock sblmnya, kiri format error
            return response()->json(['message' => 'stock tidak boleh lebih/sama dengan stock sebelumnya!'], 400);
        }
        // kalau gamasuk ke if
        $medicineBefore->update(['stock' => $request->stock]);
        return response()->json('berhasil', 200);
    }
}
