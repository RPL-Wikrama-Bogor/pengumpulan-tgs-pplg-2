<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //proses ambil data
        $medicines = Medicine::orderBy('name', 'ASC')->simplePaginate(5);
        // manggil html yabg ada di folder resources/views/medicine/index.blade.php
        // compact : mengirim data ke blade
        return view('medicine.index', compact('medicines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    // validasi 
    // 'name_input' => 'validasi1|validasi2

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',

        ]);

        // simpan data ke db : 'nama_columnb' => $request->name_input
        Medicine::create([ //medicine ini disamain sama nama model nya

            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
            'stock' => $request->stock,
            //yang ada didalam '' itu disamain sama yang di migration dan yang sesudah -> itu di sesuain sama yang ada di name input

        ]);


        return redirect()->back()->with('success', 'Berhasil menambahkan data obat!');
    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    
    public function show($id){

        $medicine = Medicine::find($id);
        // mengembalikan bentuk json dikirim data yang diambil dengan response status code 200
        // response status code api :
        // 200 -> success/ok
        // 400 an -> error kode/validasi input user
        // 419 -> error token csrf
        // 500 an -> error server hosting

        return response()->json($medicine, 200);

 }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $medicine = Medicine::find($id);

        return view('medicine.edit', compact('medicine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi

        $request->validate([
            'name' => 'required|min:3',
            'type' => 'required',
            'price' => 'required|numeric',
        ]);

        Medicine::where('id', $id)->update([
            'name' => $request->name,
            'type' => $request->type,
            'price' => $request->price,
        ]);

        // redirect ke halaman medicine data
        return redirect()->route('medicine.data')->with('success', 'Berhasil mengubah data obat!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medicine::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }


    public function stockData(){
        $medicines = Medicine::orderBy('stock', 'ASC')->simplePaginate(5);
        return view('medicine.stock', compact('medicines'));
    }


    public function updateStock(Request $request, $id){

        //validasi input
        $request->validate([
            'stock' => 'required|numeric',
        ], [
            'stock.required' => 'input stock harus diisi!',
        ]);

        // ambil data sebelum update, untuk dibandingkan
        $medicineBefore = Medicine::where('id', $id)->first();
        if($request->stock <= $medicineBefore['stock']){
            //jika stock yang diinput <= dtock sebelumnya, kirim format error
            return response()->json([ 'message' => 'stock tidak boleh lebih/sama dengan stock sebelumnya!'], 400);

        }

        //kalau gamasuk ke if

        $medicineBefore->update(['stock' => $request->stock]);
        return response()->json('berhasil', 200);

    }



}
