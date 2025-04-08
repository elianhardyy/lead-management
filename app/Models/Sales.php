<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $primaryKey = 'id_sales';
    
    protected $fillable = ['nama_sales'];

    public function leads()
    {
        return $this->hasMany(Lead::class, 'id_sales', 'id_sales');
    }
}
