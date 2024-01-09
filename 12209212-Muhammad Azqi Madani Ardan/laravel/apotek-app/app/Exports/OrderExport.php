<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
// untuk menggunaka function headings
use Maatwebsite\Excel\Concerns\WithHeadings;
// untuk menggunaka function map
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // proses pengambilan data yang akan di export di excel
    public function collection()
    {
        return Order::with('user')->get();
    }

    // menentukan nama - nama column di excel nya
    public function headings(): array
    {
        return [
            "Nama Pembeli", "Pesanan", "Total Harga (+ppn)", "Kasir", "Tanggal"
        ];
    } 

    // data dari collection (pengambilan dr db) yang akan di munculankan ke excel
    public function map($item) : array
    {
        $pesanan = "";
        foreach ($item['medicines'] as $medicine) {
            $pesanan .= "( " . $medicine['name_medicine'] . " : qty " . $medicine['qty'] . "
            " . number_format($medicine['price_after_qty'], 0, '.',','). "),";
        }
        // menghitung total harga ditambah ppn
        $totalAfterPPN = $item['total_price'] + ($item['total_price'] * 0.1);
        // urutannya harus sama dengan yang di headings
        return [
            $item->name_customer,
            $pesanan,
            "Rp. " . number_format($totalAfterPPN, 0, '.', ','),
            $item['user']['name'] ."(" . $item['user']['email'] . ")",
            Carbon::parse($item['created_at'])->format("d-m-y H:i:s")
        ];
    }
}
