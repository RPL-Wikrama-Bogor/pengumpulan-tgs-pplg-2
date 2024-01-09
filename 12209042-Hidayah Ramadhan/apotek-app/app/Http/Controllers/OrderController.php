<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\OrderExpport;
use Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //with mengambil function relasi PK ke FK atau FK ke PK dari model 
        // isi di petik disamakan dengan nama function di modelnya
        $orders  = Order::with('user')->simplePaginate(3);
        return view('order.kasir.index', compact('orders'));
    }

    public function data()
    {
        $orders  = Order::with('user')->simplePaginate(3);
        return view('order.admin.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines = medicine::all();
        return view('order.kasir.create', compact('medicines'));
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
        $medicines = array_count_values($request->medicines);

        $dataMedicines = [];
        foreach ($medicines as $key => $value) {
            $medicine = Medicine::where('id', $key)->first();
            $arrayAssoc = [
                "id" => $key,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                "qty" => $value,
                "price_after_qty" => (int)$value * (int)$medicine['price'],
            ];

            array_push($dataMedicines, $arrayAssoc);
        }
        $totalPrice = 0;
        foreach ($dataMedicines as $formatArray) {

            $totalPrice += (int)$formatArray['price_after_qty'];
        }
        $prosesTambahData = Order::create([
            'name_customer' => 
            $request->name_customer,'medicines' => $dataMedicines,
            'total_price' => $totalPrice,

            'user_id' => Auth::user()->id,
        ]);
        return redirect()->route('order.struk', $prosesTambahData['id']);
    }

    public function strukPembelian($id) 
    {
        $order = Order::where('id', $id)->first();
        return view('order.kasir.struk', compact('order'));
    }

    public function downloadPDF($id)
    {
        //get data yang akan di tampilkan di pdf
        //data wajib bertipe array
        $order = Order::where('id', $id)->first()->toArray();
        view()->share('order',$order);

        $pdf = PDF::loadView('order.kasir.download', $order);
        //ketika di download nama file nya apa
        return $pdf->download('Bukti Pembelian.pdf');
    }

    public function downloadExcel()
    {
        //nama file excel ketika di download
        $file_name = 'Data Seluruh Pembelian.xlsx';
        //panggil logic exportsnya
        return Excel::download(new OrderExpport, $file_name);
    }

    public function search (Request $request)
    {
        $searchDate = $request->input('search');

        $orders = Order::whereDate('created_at', $searchDate)->simplepaginate(5);
        return view('order.kasir.index', compact('orders'));
    }

    public function searchAdmin(Request $request)
    {
        $searchDate = $request->input('search');
        $orders = Order::whereDate('created_at', $searchDate)->simplepaginate(5);
        return view('order.admin.index', compact('orders'));
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