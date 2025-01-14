<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','invoice_id','description','quantitiy','unit_price','tax_rate'];
    public function product(){
        return $this->hasOne(Product::class);
    }
}
