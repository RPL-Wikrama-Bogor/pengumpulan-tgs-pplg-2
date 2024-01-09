<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\OrderExport;
use PDF;
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
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.kasir.index' , compact ('orders'));
        
    }

    public function data()
    {
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.admin.index', compact ('orders'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicines = Medicine::all();
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

        // penampung detail berbentukarray asssoc dari obat obat yang dipilih
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

            //format assoc dimasukkan  ke array penampung sebelumnya
            array_push($dataMedicines, $arrayAssoc);
        }

        // var totalPrice awal nya 0
        $totalPrice = 0;
        // loop data dari array penampung yang ada do format
        foreach ($dataMedicines as $formatArray) {
            $totalPrice += (int)$formatArray['price_after_qty'];
        }

       


        $prosesTambahData = Order::create([
            'name_customer' => $request->name_customer,
            'medicines' => $dataMedicines,
            'total_price' => $totalPrice,
            // user_id menyimpan data id dari orang yang login (kasir penanggung jawab)
            'user_id' => Auth::user()->id,
        ]);

        // redirect ke halaman struk
        return redirect()->route('order.struk', $prosesTambahData['id']);

    }


    public function strukPembelian($id){
        $order = Order::where('id', $id)->first();
        return view('order.kasir.struk', compact('order'));
    }



    public function downloadPDF($id){
        //get data yang akan ditampilkan di pdf
        // data yang dikirim ke pdf wajibbertipe array
        $order = Order::where('id', $id)->first()->toArray();

        //ketika data dipanggil di blade pdf, akan dipanggil dengan $ apa
        view()->share('order', $order);

        // lokasi dan nama blade yang akan di download ke pdf serta data yang akan ditampilkan
        $pdf = PDF::loadView('order.kasir.download', $order);

        //ketika di download nama file nya apa
        return $pdf->download('Bukti Pembelian.pdf');
    }

    public function downloadExcel()
    {
        $file_name = 'Data Seluruh Pembelian.xlsx';
        return Excel::download(new OrderExport, $file_name);
    }

    
    public function search(Request $request){
        $searchDate = $request->input('search');
        $orders = Order::whereDate('created_at',$searchDate)->get();
        return view('order.kasir.index', compact('orders'));
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
