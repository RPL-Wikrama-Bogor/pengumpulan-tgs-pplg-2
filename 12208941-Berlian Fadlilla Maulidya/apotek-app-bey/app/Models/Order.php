<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
        //protected $tabel = 'pemesanan'
        // di isi kalo nama model sama migrationnya ga sesuai sama si laravelnya (beda)
       //property yang di gunakan untuk menyimpan nama nama yang bisa di isi valuenya
       protected $fillabel = [
        'user_id',
        'medicines',
        'name_customer',
        'total_price',
    ];

    protected $casts = [
        //penegasan tipe data dari migration
        //memunkinkan tipe data yang gamungkin 
        'medicines' => 'array',
        
    ];

    public function user() 
    {
        //menggabungkan ke primary key nya
        //()merupakan model penyimpanan dari pk nya si fk ke model ini
        return $this->belongsTo
        //belongsto primary
        (user::class);
        //yang d dalam kurung pk
    }
}
