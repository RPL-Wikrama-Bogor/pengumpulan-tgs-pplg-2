<?php

namespace App\Exports;

use App\Models\LetterType;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
// untuk menggunkan func headings
use Maatwebsite\Excel\Concerns\WithHeadings;
// untuk menggunakan func map
use Maatwebsite\Excel\Concerns\WithMapping;

class LetterExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    // proses pengambilan data yang akan di export excel
    public function collection()
    {
        return LetterType::with('letterType')->get();
    }


    // menentukan nama nama column di excel nya
    public function headings() : array {
        return [
            "Kode Surat", "Klasifikasi Surat", "Surat Tertaut"
        ];
    }


    // data dari collection ( pengambilan dari db ) yang akan dimunculkan di excel
    public function map($item) : array{

        return[
            $item['letter_code'],
            $item['name_type'],
            '1',
        ];

    }

}
