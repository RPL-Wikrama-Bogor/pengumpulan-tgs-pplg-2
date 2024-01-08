<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medicine;
use PDF;
use App\Exports\OrderExports;
use Excel;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Excel as ExcelExcel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // with : mengambil function relasi pk dan fk atau pk ke fk dari model
        // isi di petik disamakn dengan nama function di modelnya
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.kasir.index', compact('orders'));
        
        // if ($request->has('date')) {
        //     $selectedDate = date('Y-m-d', strtotime($request->input('date')));
        //     $query->whereDate('created_at', $selectedDate);
            
        //     // check if the clear button clicked
        //     if ($request->has('clear')) {
        //         return redirect()->route('kasir.order.index');
        //     }
            
        // }
    }

    public function data() 
    {
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.admin.index', compact('orders'));
    }

    public function downloadPDF($id)
    {
        // get data yang akan ditampilkan di pdf
        $order = Order::where('id', $id)->first()->toArray();

        // ketika data dipanggil di blade pdf, akan dipanggil dengan $ apa
        view()->share('order', $order);

        // lokasi dan nama blade yg akan di download ke pdf serta data yang akan ditampilkan 
        $pdf = PDF::loadView('order.kasir.download', $order);

        // ketika di download nama file nya apa
        return $pdf->download('Bukti Pembelian.pdf');
    }

    public function downloadExcel() {
        // nama file excel ketika di download
        $file_name = 'Data Seluruh Pembelian.xlsx';
        // paggil logic exports nya
        return Excel::download(new OrderExport, $file_name);
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
        // dd($request->medicines);

        // array_count_values : menghitung jumlah item sama di dalam array
        // hasilnya berbentuk : "itemyan" => "jumllah yang sama"
        // menentukan qty
        $medicines = array_count_values($request->medicines);

        // penampung data berbentuk array2 assoc dari obat2 yg dipilih
        $dataMedicines = [];
        foreach ($medicines as $key => $value) {
            $medicine = Medicine::where('id', $key)->first();
            $arrayAssoc = [
                "id" => $key,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                "qty" => $value,
                // (int) => memastikan dan mengunbah tipe data menjadi integer
                "price_after_qty" => (int)$value * (int)$medicine['price'],
            ];
            // format assoc dimasukkan ke array penampung sebeleumnya
            array_push($dataMedicines, $arrayAssoc);
        }
        
        $totalPrice = 0;
        // loop data dr array penampung yg udah di format
        foreach ($dataMedicines as $formatArray) {
            // dia bakal menjumlahkan totalprice sebelumya ditambah data harga dari price_after_qty
            $totalPrice += $formatArray['price_after_qty'];
        }

        $prosesTambahData = Order::create([
            'name_customer' => $request->name_customer,
            'medicines' => $dataMedicines,
            'total_price' => $totalPrice,
            // user_id menyimpan data id dari orang yang login (kasir penanggung jawab)
            'user_id' => Auth::user()->id,
        ]);
        // redirect ke halaman struk
        return redirect()->route('order.struk',$prosesTambahData['id']);

        dd($medicines);
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

    public function strukPembelian($id)
    {
        $order = Order::where('id', $id)->first();
        return view('order.kasir.struk', compact('order'));
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

   public function search(Request $request)
   {
        $searchDate = $request->input('date');

        $orders = Order::whereDate('created_at', $searchDate)->get();

        return view('order.kasir.index', compact('orders'));
   }
}
