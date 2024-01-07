<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;
use App\Exports\OrderExport;
use EXCEL;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // with: mengambil funtion relasi PK ke FK atau FK ke PK dari model
        //  isi di petik disamakan dengan nama function di modelnya
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.kasir.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines = Medicine::all();
        return view ('order.kasir.create', compact('medicines'));
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
            'name_customer' => 'required',
            'medicines' => 'required',
        ]);
        // array_count_values : menghitung jumlah item sama di dalam array
        // hasilnya berbentuk : "itemnya" => "jumlah yang sama"
        // menentukan qty
        $medicines = array_count_values($request->medicines);

        $dataMedicines = [];

        foreach ($medicines as $key => $value) {
            $medicine = Medicine::where('id', $key)->first();
            $arrayAssoc = [
                "id" => $key,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                "qty"=> $value,
                // (int) => memastikan dan mengubah tipe daya menjadi integer
                "price_after_qty"=> $value * (int)$medicine['price'],
            ];
            // format assoc dimasukan ke array penampung seblumnya
            array_push($dataMedicines, $arrayAssoc);
        }
    // var total Price awalnya 0
    $totalPrice = 0;
    // loop data dari array penampung yang udah di format
    foreach ($dataMedicines as $formatArray) {
        // dia bakal menjumlahkan totalPrice sebelumnya ditambah data harga dari price_after_qty
        $totalPrice += (int)$formatArray['price_after_qty'];
    }

    $prosesTambahData = Order::create([
        'nama_customer' => $request->name_customer,
        'medicines' => $dataMedicines,
        'total_price' => $totalPrice,
        // user_id menyimpan data id dari orang yang login (kasir penanggung jawab)
        'user_id' => Auth::user()->id,
    ]);
    // redirect ke halaman struk
    return redirect()->route('order.struk', $prosesTambahData['id']);
}

    public function strukPembelian($id)
    {
        // first => mau nampilin struknya cuma 1 data
        $order = Order::where('id', $id)->first();

        return view('order.kasir.struk', compact('order'));
    }

    public function downloadPDF($id)
    {
        // get data yang akan di tampilkan
        // data yang dikirim ke pdf wajib bertipe array
        $order = Order::where('id', $id)->first()->toArray();

        // ketika data dipanggil di blade pdf, akan dipanggil dengan $ apa
        view()->share('order', $order);

        // lokasi dan nama blade yang akan di download ke pdf serta data yang akan ditampilkan
        $pdf = PDF::loadView('order.kasir.download', $order);

        // ketika di download nama file nya apa
        return $pdf->download('Bukti Pembelian pdf');
    }

    public function search(Request $request)
    {
        $searchDate = $request->get('search');
        $orders = Order::whereDate('created_at', $searchDate)->simplePaginate(5);
        return view('order.kasir.index', compact('orders'));
    }

    public function data()
    {
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.admin.index', compact('orders'));
    }

    public function downloadExcel()
    {
        // nama file excel ketika di download
        $file_name = 'Data Seluruh Pembelian.xlsx';
        // panggil logic exports nya
        return EXCEL::download(new OrderExport, $file_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
