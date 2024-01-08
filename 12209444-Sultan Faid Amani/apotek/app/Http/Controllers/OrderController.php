<?php

namespace App\Http\Controllers;
use App\Models\Medicine;  
use App\Models\Order;
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
        $orders = Order::simplePaginate(5);
        return view('order.kasir.index', compact('orders'));
    }

    public function data()
    {
        $orders = Order:: with('user')->simplePaginate(5);
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
        foreach($medicines as $key => $value){
            $medicine = Medicine::where('id', $key)->first();
            $arrayAssoc = [
                "id" => $key ,
                "name_medicine" => $medicine['name'] ,
                "price" => $medicine['price'] ,
                "qty" => $value ,
                "price_after_qty" => (int)$value * (int)$medicine['price'],
            ];
            array_push($dataMedicines, $arrayAssoc);
        
        }
        $totalPrice = 0;
        foreach($dataMedicines as $formatArray){
            $totalPrice += (int)$formatArray['price_after_qty'];
        }
        $prosesTambahData = Order::create([
            'name_costumer' => $request->name_customer,
            'medicines' => $dataMedicines,
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
        //get data yang akan ditampilkan di pdf
        //data yang dikirim ke pdf wajib bertipe array
        $order = Order::where('id', $id)->first()->toArray();
        //ketika data dipanggil di blade php pdf akan dipanggil dengan $ apa
        view()->share('order', $order);
        $pdf = PDF::loadView('order.kasir.download', $order);
        return $pdf->download('Bukti Pembelian.pdf');
    }

    public function search(Request $request)
    {
        $searchDate = $request->input('search');
        $orders = Order::whereDate('created_at', $searchDate)->simplePaginate(5);
        return view('order.kasir.index', compact('orders'));
    }

    public function searchData(Request $request)
    {
        $searchDate = $request->input('search');
        $orders = Order::whereDate('created_at', $searchDate)->simplePaginate(5);
        return view('order.admin.index', compact('orders'));
    }

    public function downloadExcel()
    {
        $file_name = 'Data Seluruh Pembelian.xlsx';
        return Excel::download(new OrderExport, $file_name);
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
}
