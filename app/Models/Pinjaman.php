<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';
    protected $fillable = 
    [
        'user_id', 
        'book_id', 
        'tanggal_pinjam', 
        'tanggal_kembali', 
        'status'
    ];

    protected $casts = [
        'tanggal_pinjam' => 'datetime',
        'tanggal_kembali' => 'datetime',
    ];


    public function book()
    {
        return $this->belongsTo(Admin::class, 'book_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

