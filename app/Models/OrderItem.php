<?php

namespace CodeDelivery\Models;
use CodeDelivery\Models\Order;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //
     protected $fillable= ['product_id',
                         'order_id',
                         'qtd',
                         'price',
                         ];
    
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
    public function order(){
        return $this->belongsTo(Order::class);
    }
    
}
