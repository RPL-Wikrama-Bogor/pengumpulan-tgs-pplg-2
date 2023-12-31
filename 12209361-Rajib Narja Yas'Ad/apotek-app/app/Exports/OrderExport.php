<?php

namespace App\Exports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
// untuk menggunakan func heading
use Maatwebsite\Excel\Concerns\WithHeadings;
// untuk menggunakan func mapping
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    // proses pengambilan data yang akan di export d excel
    public function collection()
    {
        return Order::with('user')->get();
    }

    // menentukan nama column di exelnya
    public function headings() : array
    {
        return [
            "name pembeli", "pesanana", "Total Harga (+ppn)", "kasir", "tanggal",
        ];
    }

    // data dari collection (pengambilan dari db) yang akan muncul di excel
    public function map($item) : array
    {
        $pesanan ="";
        foreach($item['medicines'] as $medicine ) {
            $pesanan .="(" . $medicine['name_medicine'] . " :qty" . $medicine['qty'] . " " .
            number_format($medicine['price_after_qty'], 0, '.', ',') . " ), ";
        }
        // menghitung total harga ditambah ppn
        $totalAfterPPN = $item->total_price + ($item->total_price * 0.1);

        // urutannya harus sama dengan yang diheadings
        return[
            $item['name_customer'], $pesanan, "Rp." . number_format($totalAfterPPN, 0, '.', ','),
            $item['user']['name'] . "(" . $item['user']['email'] . ")" , Carbon::parse($item['created_at'])->format('d-m-y H:i:s'),
        ];
    }
}
