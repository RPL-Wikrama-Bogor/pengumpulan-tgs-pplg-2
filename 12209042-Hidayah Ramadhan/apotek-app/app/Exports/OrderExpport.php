<?php

namespace App\Exports;
use Carbon\Carbon;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
//untk menggunakan func headings
use Maatwebsite\Excel\Concerns\WithHeadings;
//untk menggunakan func map
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderExpport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // proses pengambilan data yg akan di export
    public function collection()
    {
        return Order::with('user')->get();
    }
    //menentukan nama column di excelnya
    public function headings() : array
    {
        return [
            "Nama Pembeli", "Pesanan", "Total Harga (+ppn)", "Kasir", "Tanggal"
        ];
    }
    // data dari collection (pengambilan dr db)
    public function map($item) : array
    {
        $pesanan = "";
        foreach ($item['medicines'] as $medicine) {
            $pesanan .="(" . $medicine['name_medicine'] . " : qty " . $medicine['qty'] . "" . number_format($medicine['price_after_qty'], 0,'.',',') .") ,";
        }
        $totalAfterPPN = $item['total_price'] + ($item['total_price'] * 0.1);

        return [
            $item['name_customer'],
            $pesanan,
            "Rp. " . number_format($totalAfterPPN, 0,'.',','),
            $item['user']['name'] . "(" . $item['user']['email'] . ")",
            Carbon::parse($item['created_at'])->format("d-m-y H:i:s")
        ];
    }
}
