<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoicemodel extends Model
{
    protected $table = 'productgstvalue';
    protected $primaryKey = 'id';

    protected $fillable=[
        'productname',
        'mrp',
        'base_price',
        'gst_rate',
        'central_gst_rate',
        'central_gst_amount',
        'state_gst_rate',
        'state_gst_amount',
        'gst_amount',
        'total_price',
  
];
}
