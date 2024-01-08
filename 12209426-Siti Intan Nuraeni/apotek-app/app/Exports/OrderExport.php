<?php
// fungsinya untuk mendefinisikan file ini lokasinya ada dimana
namespace App\Exports;

// fungsinya untuk memanggil order model
use App\Models\Order;
use  Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
// UNTUK MENGGUNAKAN FUNC headings
use Maatwebsite\Excel\Concerns\WithHeadings;
// UNTUK MENGGUNAKAN FUNC map
use Maatwebsite\Excel\Concerns\WithMapping;



class OrderExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // bedanya all dan get & const
    // all memanggil semua data & get = memanggil berdasarkan kriteria tertentu & const = memanggil salah satu
    // proses pengambilan data yang akan di export
    public function collection()
    {
        // user: disamakan dengan funct di modelnya
        return Order::with('user')->get();
    }
    //  headers dan map bersifat optional
    // menentukan nama nama column di excelnya
    public function headings() : array
    {
        return [
            "Nama Pembeli", 
            "Pesanan",
            "Total Harga (+ppn)",
            "Kasir",
            "Tanggal"
        ];
    }
    // date dari collection (pengambilan dari db) yang akan dimunculkan ke excel -> sebagai perantara
    // fungsi parameter $item
    public function map($item) : array 
    {
        $pesanan = "";
        foreach ($item['medicines'] as $medicine) {
            // .= -> konket ? karena bisa memilih lebih dari satu
            //  = -> karena memilih hanya 1 saja
            $pesanan .= "(". $medicine['name_medicine']  . " : qty" . number_format($medicine['price'], 0, '.', ',') . $medicine['name_medicine'] . number_format($medicine['price_after_qty'], 0, '.', ',') . "),";
        }
        $totalAfterPPN = $item->total_price + ($item->total_price * 0.1);
        // urutannya harus sama dengan yang headings
        return [
            $item->name_customer,
            $pesanan,
            "Rp. " . number_format($totalAfterPPN, 0, '', ','),
            $item['user']['name'] . "(" . $item['user']['email'] . ")",
            Carbon::parse($item['created_at'])->format("d-m-y H:i:s")
        ];
    } 
}