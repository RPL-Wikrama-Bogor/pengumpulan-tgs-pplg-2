<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medicine;
use PDF;
use App\Exports\OrderExport;
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
        //With : mengambil fungsi relasi PK ke Fk atau FK ke PK dari model 
        // Isi dipetik disamakan dengan nama functionnya  di modelnya
        $orders = Order::with('user')->simplePaginate(5);
        // dd ($orders)
        return view('order.kasir.index',compact('orders'));
    }

    public function data() 
    {
        $orders = Order::with('user')->simplePaginate(5);
        return view('order.admin.index', compact('orders'));
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
        //
        $medicines = Medicine::all();
        return view('order.kasir.create',compact('medicines'));


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name_customer' => 'required',
            'medicines' => 'required',
        ]);

        // hasilnya berbentuk : "itemnya" => "jumlah yang sama"
    // menentutak quantity (qty)
        $medicines = array_count_values($request->medicines);

        // penampung detail array berbentuk array 2 assoc dari data data yang dipilih
        $dataMedicines = [];
        foreach($medicines as $key => $value){
            $medicine = Medicine::where('id',$key)->first();
            $arrayAssoc = [
                "id" => $key,
                "name_medicine" => $medicine['name'] ,
                "price" =>$medicine['price'] ,
                "qty" => $value,
                //(int) memastikan dan mengubah tipe data menjadi integer
                "price_after_qty" => (int)$value * (int)$medicine['price'],
            ];
            // format assoc dimasukkan ke array penampung sebelumnya
            array_push($dataMedicines,$arrayAssoc);
        }

        // var total price awalnya 0
        $totalPrice = 0;
        // loop data dari array penamoung yg sudah di format
        foreach($dataMedicines as $formatArray){
            // dia bakal menambahkan  totalPrice sebelumnya ditambah data harga dari price_after_qty
            $totalPrice += (int)$formatArray['price_after_qty'];
        }
        $prosesTambahData = Order::create([
            'name_customer' => $request->name_customer,
            'medicines' => $dataMedicines,
            'total_price' => $totalPrice,
            // user id menyimpan data id dari orang yang login kasir penanggung jawab
            'user_id' => Auth::user()->id,
        ]);

        // redirect ke halaman login
        return redirect()->route('order.struk',$prosesTambahData['id']);

    }

    /**
     * Display the specified resource.
     */
    public function strukPembelian($id)
    {
        //
        $order = Order::where('id',$id)->first();
        return view('order.kasir.struk',compact('order'));
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
    public function downloadPDF($id)
    {
        //get data yang akan ditampilkan pada pdf
        //data yang dikirim ke PDF wajib array
        // toArray : merubah fungsi dari model apapun menjadi sebuah array
        // first = mengambil data haya satu
        $order = Order::where('id',$id)->first()->toArray();

        // ketika data dipanggil di blade pdf,akan dipanggil dengan $apa
        view()->share('order',$order);

        // lokasi dan nama blade yang akan didownload ke pdf serta data yang akan ditampilkan 
        $pdf = PDF::loadView('order.kasir.download',$order);

        // ketika didownload nama file apa
        return $pdf->download('Bukti Pembelian.pdf');   
    }

    public function search(Request $request){
        // $query= "SELECT * FROM students
        //             WHERE
        //         nama LIKE '%$keyword%' OR
        //         nis LIKE '%$keyword%' OR
        //         rombel LIKE '%$keyword%' OR
        //         rayon LIKE '%$keyword%' OR
        //         status LIKE '%$keyword%'
        //     ";
        
        //     return query($query);

        $get = $request->input('search');
        
        $orders = Order::whereDate('created_at',$get)->simplePaginate(5);

        
            // $medicine = Medicine::where('created_at',$order)->first();
            
            // format assoc dimasukkan ke array penampung sebelumnya
        

        return view('order.kasir.index', compact('orders'));


    }
    // }
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
