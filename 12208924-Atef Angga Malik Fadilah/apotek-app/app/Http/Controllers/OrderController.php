<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  
use PDF;
use App\Exports\OrderExport;
use Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // with : mengambil function relasi PK ke FK atau FK dari model
        // isi di petik disamakan dengan nama function di modelnya
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.kasir.index', compact('orders'));
    }

    public function data()
    {
        // with : mengambil function relasi PK ke FK atau FK dari model
        // isi di petik disamakan dengan nama function di modelnya
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.admin.index', compact('orders'));
    }

    public function search(Request $request)
    {
        $searchDate = $request->input('search');

        $orders = Order::whereDate('created_at', $searchDate)->simplePaginate(5);

        return view('order.kasir.index', compact('orders'));
    }

    public function searchAdmin(Request $request)
    {
        $searchDate = $request->input('search');

        $orders = Order::whereDate('created_at', $searchDate)->simplePaginate(5);

        return view('order.admin.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $medicines = Medicine::all();
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

        $medicines = array_count_values($request->medicines);

        $dataMedicines = [];

        foreach ($medicines as $key => $value) {
            $medicine = Medicine::where('id', $key)->first();
            $arrayAssoc = [
                "id" => $key,
                "name_medicine" => $medicine["name"],
                "price" => $medicine["price"],
                'qty' => $value,
                // untuk memastikan dan mengubah data menjadi int
                "price_after_qty" => (int)$value * (int)$medicine["price"]
            ];
            // masukkan struktur array tersebut ke array kosong yg disediakan sebelumnya
            array_push($dataMedicines, $arrayAssoc);
        }
        // total harga pembelian dari obat obat yang dipilih
        $totalPrice = 0;
        // looping format array medicines baru
        foreach ($dataMedicines as $formatArray){
            // total harga pembelian di tambahkan dari keseluruhan price_after_qty data medicines
            $totalPrice += (int)$formatArray['price_after_qty'];
        }
        // tambah data ke database
        $proses = Order::create([
            // data user_id diambil dari id akun kasir yg sedang login
            'user_id' => Auth::user()->id,
            'medicines' => $dataMedicines,
            'name_customer' => $request->name_customer,
            'total_price' => $totalPrice,
        ]);

        if ($proses) {
            $order = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->first();
            return redirect()->route('order.struk', $order['id']);
        } else {
            return redirect()->back()->with('failed', 'Gagal membuat data pembelian. Silahkan coba kembali dengan data yang sesuai!');
        }

    }

    public function strukPembelian($key){
        $order = Order::where('id',$key)->first();
        return view('order.kasir.struk',compact('order'));
    }

    public function downloadPDF($id){

        // get data yang akan ditampilkan di pdf
        // data yang dikirim ke pdf wajib bertipe data array
        $order = Order::where('id', $id)->first()->toArray();

        // ketika data dipanggil di blade PDF, akan dipanggil dengan $apa
        view()->share('order', $order);

        // lokasi dan nama blade yg akan di download ke pdf serta data yg akan ditampilkan
        $pdf = PDF::loadView('order.kasir.download', $order);

        // ketika di download nama file nya apa
        return $pdf->download('Bukti Pembelian.pdf');
    }

    public function downloadExcel(){
        $file_name = 'Data Seluruh Pembelian.xlsx';
        return Excel::download(new OrderExport, $file_name);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order){
        
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
