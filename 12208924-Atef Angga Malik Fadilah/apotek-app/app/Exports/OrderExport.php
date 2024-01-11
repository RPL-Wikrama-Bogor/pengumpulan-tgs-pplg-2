<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
// untuk menggunakan func Headings
use Maatwebsite\Excel\Concerns\WithHeadings;
// untuk menggunakan func map
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection,WithHeadings,WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::with('user')->get();
    }

    public function headings() : array
    {
        return [
            "Nama Pembeli", "Pesanan", "Total Harga (+ppn)", "Kasir", "Tanggal"
        ];
    }

    // map = memanipulasi data databases sebelum di tampilkan ke excel
    public function map($item) : array
    {
        $pesanan = "";
        foreach ($item['medicines'] as $medicine){
            // .= untuk menggabungkan jika obat lebih dari 1
            $pesanan .=  "( " . $medicine['name_medicine'] . " : qty " . 
            $medicine["qty"] . " :  Rp. " . number_format($medicine['price_after_qty'], 0, '.', '.') . " ), ";

            $totalAfterPPN = $item['total_price'] + ($item['total_price'] * 0.1);
            return [
                $item['name_customer'], $pesanan, "RP. " . number_format($totalAfterPPN,0, '.','.'),
                $item ['user']['name'] . "(" . $item['user']['email'] . ")",
                Carbon::parse($item['created_at'])->format("d-m-y H:i:s")
            ];
        }
    }
}
