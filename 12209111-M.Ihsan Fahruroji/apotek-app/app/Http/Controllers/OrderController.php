<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Http\Request;
// use Illuminate\Support\Arr;
use PDF;
use App\Exports\OrderExport;
use Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
     
    public function downloadExcel()
    {
        $file_name = 'Data seluruh pembelian.xlsx';

        return Excel::download(new OrderExport, $file_name);
    }
    public function data()
    {
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.admin.index',compact('orders'));

    }
    
    public function index()
    {
        $orders = Order::with('user')->simplePaginate(5);
        // dd($orders);
        return view('order.kasir.index',compact('orders'));
    }
    
    public function search(Request $request)
    {
        $searchData = $request->input('search');
        
        $orders = Order::whereDate('created_at', $searchData)->simplePaginate(5);

        return view('order.kasir.index', compact('orders'));
    }

    public function searchAdmin(Request $request)
    {
        $searchData = $request->input('search');
        
        $orders = Order::whereDate('created_at', $searchData)->simplePaginate(5);

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
            'nama_customer' => 'required',
            'medicines' => 'required',
        ]);
        // array_count_values : Menghitung jumlah item sama di dalam array
        // Hasilnya berbentuk : "itemnya" => "Jumlah yang sama"
        // Menentukan qty
        // [ "item" => "jumlah" ]
        $medicines = array_count_values($request->medicines);
        // Menampung detail berbentuk array-array assoc dari obat-obat yang dipilih
        $dataMedicines = [];
        foreach ($medicines as $key => $value) {
            // Mencari data obat berdasarkan id (obat yang dipilih)
            $medicine = Medicine::where('id', $key)->first();
            $arrayAssoc = [
                "id" => $key,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                "qty" => $value,
                // (int) => memastikan dan mengubah tipe data menjadi integer 
                "price_after_qty" => (int)$value * (int)$medicine['price'],
            ];
            // Format assoc dimasukan ke array penampung sebelumnya
            array_push($dataMedicines, $arrayAssoc);
        }
 
        // Variable totalPrice awalnya 0
        $totalPrice = 0;
        
        // Looping data dari array penampung yang ada di format
        foreach ($dataMedicines as $formatArray) {
 
            // Dia bakal menjumlahkan total price sebelumnya ditambah data harga dari price_after_qty
            $totalPrice += (int)$formatArray['price_after_qty'];
        }
 
        $prosesTambahData = Order::create([
            'nama_customer' => $request->nama_customer,
            'medicines' => $dataMedicines,
            'total_price' => $totalPrice,
 
            // user_id menyimpan data id dari orang yang login kasir penanggung jawab
            'user_id' => Auth::user()->id,
        ]);
 
        // redirect ke halaman struk
        return redirect()->route('order.struk', $prosesTambahData['id']);
    }
     
    public function downloadPDF($id)
    {
        //get data yang akan ditampilkan pdf
        //data yang dikirim ke pdf wajib bertipe array
        $order = order::where('id', $id)->first()->toArray();

        view()->share('order',$order);

        $pdf = PDF::loadview('order.kasir.download',$order);

        return $pdf->download('Bukti pembelian.pdf');
    }

    /**
     * Display the specified resource.
     */
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

    public function strukPembelian($id) 
    {
        $order = Order::where('id', $id)->first();
        // dd($order);

        return view('order.kasir.struk', compact('order'));
    }
}