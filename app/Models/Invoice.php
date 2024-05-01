<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $fillable = [
        'status_invoices'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function setDateCreateOrder()
    {
        return $this->created_at->Format('d-m-Y');
    }
}
