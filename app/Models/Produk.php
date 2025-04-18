<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    
    protected $fillable = ['nama_produk'];

    public function leads()
    {
        return $this->hasMany(Lead::class, 'id_produk', 'id_produk');
    }
}
