<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public function invoice_item(){
        return $this->hasOne('App\Models\InvoiceItem','invoice_id');
    }
    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
