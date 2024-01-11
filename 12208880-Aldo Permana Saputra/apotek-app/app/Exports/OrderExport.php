<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
// untuk menggunkan func headings
use Maatwebsite\Excel\Concerns\WithHeadings;
// untuk menggunakan func map
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    // proses pengambilan data yang akan di export excel
    public function collection()
    {
        return Order::with('user')->get();
    }


    // menentukan nama nama column di excel nya
    public function headings() : array {
        return [
            "Nama Pembeli", "Pesanan", "Total Harga (+ppn)", "Pesanan", "Kasir", "Tanggal"
        ];
    }


    // data dari collection ( pengambilan dari db ) yang akan dimunculkan di excel
    public function map($item) : array{
        $pesanan = "";
        foreach ($item['medicines'] as $medicine) {
            $pesanan .= "( " . $medicine['name_medicine'] . " : qty " . $medicine['qty'] . " : Rp." . " " . number_format($medicine['price_after_qty'], 0, ',', '.') . " ),";
        }
        // menghitung totl harga ditambah ppn
        $totalAfterPPN = $item->total_price + ($item->total_price * 0.1);

        // urutan nya harus sama dengan yang di headings
        return[
            $item['name_costumer'],
            $pesanan,
            "Rp. " . number_format($totalAfterPPN, 0, ',', '.'),
            $item['user']['name'] . "(" . $item['user']['email'] . ")",
            Carbon::parse($item['created_at'])->format("d-m-y H-i-s")
        ];

    }

}
