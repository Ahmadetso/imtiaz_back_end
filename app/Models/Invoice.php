<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = ['due_date', 'discount_amount', 'paid_amount', 'customer_id', 'is_fully_paid','notes','invoice_date','shipping_adress','customer_adress'];

    public function customers(){
        return $this->belongsTo(Customer::class);
    }
    public function InvoiceItems(){
        return $this->hasMany(InvoiceItem::class);
    }

}
