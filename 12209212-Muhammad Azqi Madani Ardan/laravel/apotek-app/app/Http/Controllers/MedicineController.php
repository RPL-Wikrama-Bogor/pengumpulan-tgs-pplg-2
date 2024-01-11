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
        //proses ambil data
        $medicines = Medicine::orderBy('name','ASC')->simplePaginate(5);
        // mannggil html yang ada di folder resources/views/medicine.index.blade.php
        //compact : mengirim data ke blade 
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
        $medicine =Medicine::find($id);
        // mengembalikan bentuk json dikirim data yang diambil dari response status code 200
        // response status code api :
        // 200 -> success/ok
        // 400 an -> errror kode/validasi input
        // 419 ->error token csrf
        // 500 an -> error server hosting
        return response()->json($medicine,200);
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // mengambil data yang belum dimunculkan
        // find: mencari berdasarkan column
        // bisa jkuga : where ('id',$id)->first()
        $medicine = Medicine::find($id);

        return view('medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // validasi
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);
        // cari berdasarkan id terus update
        Medicine::where('id',$id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);
        // redirect ke html medicine data
        // route digunakan untuk memindahkan suatu ke page yang lain jika ingin menambahkan notif ke tempat lain bisa di ganti ke medicine.tambah atau medicine.edit
        return redirect()->route('medicine.data')->with('success','Berhasil mengubah data obat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        Medicine::where('id',$id)->delete();
        return redirect()->back()->with('deleted','Berhasil menghapus data!');
    }

    public function stockData(){
        $medicines = Medicine::orderBy('stock','ASC')->simplePaginate(5);
        return view('medicine.stock',compact('medicines'));
    }

    public function updateStock(Request $request, $id){
        $request->validate([
            'stock' => 'required|numeric',
        ],[
            "stock_required" => "Input stock harus diisi!",
        ]);

        $medicineBefore = Medicine::where('id',$id)->first();
        if ($request->stock <= $medicineBefore['stock']){
            return response()->json(['message' => 'stock tidak boleh lebih/sama dengan stock sebelumnya serta kurang!'],400);
        }

        // kalau gamasuk ke if
        $medicineBefore->update(['stock' => $request->stock]);
        return response()->json('berhasil',200);

    }
}