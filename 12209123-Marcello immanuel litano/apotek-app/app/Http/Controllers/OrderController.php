<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\orderExport;
use Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $orders = Order::simplePaginate(5);
        return view('order.kasir.index', compact('orders'));
    }

    public function data()
    {
        $orders = Order::simplePaginate(5);
        return view('order.admin.index', compact('orders'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = medicine::all();
        return view('order.kasir.create', compact('medicines'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_customer' => 'required',
            'medicines' => 'required',
        ]);
    

    //array_count_values : menghitung jumlah item yang sama di dalam array
    //hasilnya berbentuk : "itemnya" => "jumlah yang sama"
    //menentukan qty
    $medicines = array_count_values($request->medicines);

    //penampung detail berbentuk array2 assoc dari obat2 yg dipilih
    $dataMedicines = [];
    foreach ($medicines as $key => $value) {
        $medicines = Medicine::where('id', $key)->first();
        $arrayAssoc = [
            "id" => $key,
            "name_medicine" => $medicines['name'],
            "price" => $medicines['price'],
            "qty" => $value,
            //(int) memastikan dan mengubah tipe data menjadi integer
            "price_after_qty" => (int)$value * (int)$medicines['price'],
        ];
        //format assoc dimasukkan ke array penampung sebelumnya
        array_push($dataMedicines, $arrayAssoc);
    }
    $totalPrice = 0;
    //loop data dari array penampung yang udah di format
    foreach ($dataMedicines as $formatArray) {
        //dia bakal menjumlah totalPrice sebelumnya ditambah harga dari after qty
        $totalPrice += $formatArray['price_after_qty'];
    }

    $procesTambahData = Order::create([
        'name_customer' => $request->name_customer,
        'medicines' => $dataMedicines,
        'total_price' => $totalPrice,
        //user id menyimpan data id dari orang yang login (kasir penanggung jawab)
        'user_id' => Auth::user()->id,
    ]);
    //redirect ke halaman struk
    return redirect()->route('order.struk', $procesTambahData['id']);
    }
    public function strukPembelian($id)
    {
        $order = Order::where('id', $id)->first();

        return view('order.kasir.struk', compact('order'));
    }
    public function  downloadPDF($id)
    {
        // get data yang akan ditampilkan di pdf
        // data yg dikirim ke pdf wajib bertipe array
        $order = Order::where('id', $id)->first()->toArray();

        // ketika data dipanggil di blade pdf, akan dipanggil dengan $ apa
        view()->share('order',$order);

        // lokasi dan nama blade yg akan di download ke pdf serta data yg akan ditampilkan
        $pdf = PDF::loadview('order.kasir.download', $order);

        // ketika di download nama file nya apa
        return $pdf->download('Bukti Pembelian.pdf');
    }

    public function downloadExcel(){
        //nama file excel ketika di download
        $file_name = 'Data Seluruh Peembelian.xlsx';
        // panggil logic expoert nya
        return excel::download(new orderExport, $file_name);
    }

    public function search(Request $request)
    {
        $searchDate = $request->input('search');

        $orders = Order::whereDate('created_at', $searchDate)->simplePaginate();
        return view('order.kasir.index', compact('orders'));
    }

    public function searchAdmin(Request $request)
    {
        $searchDate = $request->input('search');

        $orders = Order::whereDate('created_at', $searchDate)->simplePaginate();
        return view('order.admin.index', compact('orders'));
    }

    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
