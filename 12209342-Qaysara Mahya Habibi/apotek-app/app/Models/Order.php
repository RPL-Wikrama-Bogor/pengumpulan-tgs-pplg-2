<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // protected $table = 'pemesanan'; untuk menyesuaikan aturan penulisan di laravel
    protected $fillable = [
        'user_id',
        'medicines',
        // ping_nama
        'nama_customer',
        'total_price',
    ];

    protected $casts = [
        'medicines' => 'array',
    ];


    public function user()
    {
        // bertugas untuk menyambungkan antara table yang satu dengan yang lain
        // belongsTo berperan sebagai foreign key
        return $this->belongsTo
        (User::class);
    }
}