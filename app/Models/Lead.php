<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
     use HasFactory;

    protected $table = 'leads';
    protected $primaryKey = 'id_leads';
    
    protected $fillable = [
        'tanggal', 'id_sales', 'id_produk', 'no_wa', 
        'nama_lead', 'kota', 'id_user'
    ];

    public function sales()
    {
        return $this->belongsTo(Sales::class, 'id_sales', 'id_sales');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}
