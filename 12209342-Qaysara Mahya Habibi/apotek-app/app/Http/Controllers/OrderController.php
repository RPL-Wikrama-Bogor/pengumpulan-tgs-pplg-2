<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Auth;
use PDF;
use App\Exports\OrderExport;
use Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data()
    {
        // with() mengambil function relasi PK ke FK atau FK ke PK dari model
        // isi di petik disamakan dengan nama function modelnya
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.admin.index', compact('orders'));
    }
    public function index()
    {
        // with() mengambil function relasi PK ke FK atau FK ke PK dari model
        // isi di petik disamakan dengan nama function modelnya
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

        // array count values = menghu-itung jumlah item sama di dalam array
        // hasilnya berbentuk : "itemnya => "jumlah item yang sama"
        // menentukan qty
        $medicines = array_count_values($request->medicines);
        // dd($medicines);
        // PENAMPUNG detail berbentuk array2 assoc dari obat yang dipilih
        $dataMedicines = [];
        foreach($medicines as $key => $value) {
            $medicine = Medicine::where('id', $key)->first();
            $arrayAssoc = [
                "id" => $key,
                "name_medicine" => $medicine['name'],
                "price" => $medicine['price'],
                "qty" => $value,
                // (int) => memastikan dan mengubah tipe datanya intreger
                "price_after_qty" => $value * (int)$medicine['price'],
            ];
            // format assoc dimasukan ke array penampung sebelumnya
            array_push($dataMedicines, $arrayAssoc);
        }

        // inisialisasi
        $totalPrice = 0;
        // loop data dr array penampung yg uda di format
        foreach ($dataMedicines as $formatArray) {
            // dia bakal menjumlahkan totalPrice sebelum ditambahkan dat aharga dari price_after_qty
            $totalPrice += (int)$formatArray['price_after_qty'];
        }

        $prosesTambahData = Order::create([
            // ping_nama
            'nama_customer' => $request->name_customer,
            'medicines' => $dataMedicines,
            'total_price' => $totalPrice,
            // user id menyimpan data id meyimpan data id dari orang yang login (kasir PJ)
            'user_id' => Auth::user()->id,
        ]);
        // reidrect ke halaman sturk
        return redirect()->route('order.struk', $prosesTambahData['id']); 
    }

    // menggunakan parameter id karena di dalam route memanggil path dinamis bernama id 
    public function struk($id) {
        // first()
        $order = Order::where('id', $id)->first();

        return view('order.kasir.struk', compact('order'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF($id)
    {
        // get data yang akan ditampilkan di odf
        // data yang dikirim ke pdf wajib bertipe array
        $order = Order::where('id', $id)->first()->toArray();

        // ketika data dipanggil di blade pdf, akan t=dipanggil dengan $apa
        view()->share('order', $order);

        // lokasi dan nama blade yg akan di download ke pdf sertda data yang akan ditampilkan 
        $pdf = PDF::loadView('order.kasir.download', $order);

        // ketika di download nama filenya apa
        return $pdf->download('Bukti Pembelian PDF');
    }
    public function search(Request $request)
    {
        $searchDate = $request->get('search');
        $orders = Order::whereDate('created_at', $searchDate)->simplePaginate(5);
        return view('order.kasir.index', compact('orders'));    
    }
    public function searchAdmin(Request $request)
    {
        $searchDate = $request->get('searchAdmin');
        $orders = Order::whereDate('created_at', $searchDate)->simplePaginate(5);
        return view('order.admin.index', compact('orders'));    
    }
    public function user()
    {
        // menghubungkan ke primary key nya
        // dalam kurung merupakan nama model tempat penyimpanan dair PK nya si FK yang ada di model ini
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        // membuat relasi ke table lain dengan tipe one to many
        // dalam kurung merupakan nama model yang akan disambungkan (fk)
        return $this->hasMany(Order::class);
    }

    
    public function downloadExcel()
    {
        // nama file excel ketika di download
        $file_name = 'Data seluruh Pembelian.xlsx';
        // panggil logic exports nya
        return Excel::download(new OrderExport, $file_name);
    }
    public function show(Order $order)
    {
        
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
