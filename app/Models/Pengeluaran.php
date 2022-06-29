<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran';
    protected $primaryKey = 'id_pengeluaran';
    protected $guarded = [];

    // public function supplier()
    // {
    //     return $this->belongsTo(Supplier::class, 'id_supplier', 'id_supplier');
    // }
}
