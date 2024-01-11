<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\carbon;

class Orderexport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // proses pengambilan data yg akan di export excel
    public function collection()
    {
        return Order::all();
    }
    // menentukan nama nama column di excel nya
    public function headings() : array
    {
        return [
            'Nama Pembeli',
            'Pesanan',
            'Total bayar (+ppn)',
            'Kasir',
            'Tanggal',
        ];
    }
    // data dari collection (mengambil dr  db) yang akan dimunculkan ke excel 
    public function map($item): array
    {
        $pesanan = "";
        foreach ($item['medicines'] as $medicine) {
            $pesanan .= "(" . $medicine['name_medicine'] . " qty " . $medicine['qty'] . " " . number_format($medicine['price_after_qty'], 0, '.', ',') . ")," ;
        }
        $totalAfterPPN = $item['total_price'] + ($item['total_price'] * 0.1);
        return [
            $item -> name_customer,
            $pesanan,
            "Rp ".number_format($totalAfterPPN, 0, '.', ','),
            $item['user']['name'],
            Carbon::parse($item['created_at'])->format("D-M-Y H:i:s")
        ];
    }
}