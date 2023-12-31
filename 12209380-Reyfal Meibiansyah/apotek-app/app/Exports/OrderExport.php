<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
//unutk menggunakan func heading
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
    //memnentukan nama-nama column di excelnya
    public function headings() : array
    {
        return [
            "Nama Pembeli", "Pesanan", "Total Harga (+ppn)", "Kasir", "Tanggal"
        ];
    }
    //data dari collection (pengambilan dari db)  yang akan di munculkan ke excel
    public function map($item) : array
    {
        $pesanan = "";
        foreach ($item['medicines'] as $medicine) {
            $pesanan .= "(" . $medicine['name_medicine'] . " : qty" . $medicine['qty'] . " " . number_format($medicine['price_after_qty'], 0,'.',',') . " ),";
        }

    $totalAfterPPN = $item['total_price'] + ($item['total_price'] * 0.1);
    //urutannya harus sama dengan yang di headings
    return [
        $item['name_customer'],
        $pesanan,
        "Rp. " . number_format($totalAfterPPN, 0, '.','.'),
        $item['user']['name'] . "(" . $item['user']['email'] . ")",
        Carbon::parse($item['created_at'])->format("d-m-Y H:i:s")
    ];
    }
}
