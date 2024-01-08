<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

// use App\Models\Orders;
use Carbon\Carbon;

class OrderExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::with('user')->get();
    }
    //menentukan nama nama coloum di exel nya
    public function headings() : array
    {
       return[
        "Nama pembeli","pesanan","Total Harga (+ppn)","kasir","tanggal"
       ];
    }
    //data dari collection (pengambilan dari db) yang akan dimunculkan ke exel
    public function map($item) : array
    {
       $pesanan = "";
       foreach ($item['medicines'] as $medicine){
        $pesanan .= "(".$medicine['name_medicine'] . ": qty" . $medicine['qty']."".number_format($medicine['price_after_qty'], 0, '.',',') . "),";
       }
       $totalAfterPPN = $item['total_price'] + ($item['total_price'] * 0.1);
    //    urutannya harus sama dengan di headings

     return [
        $item['name_customer'],
        $pesanan,
        "Rp. " . number_format($totalAfterPPN,0,'.',','),
        $item['user']['name'] . "(". $item['user']['email'] .")",
        Carbon::parse($item['created_at'])
        ->format("d-m-y H:i:s")
     ];
    }
}
