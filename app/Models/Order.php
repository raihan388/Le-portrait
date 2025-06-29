<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'code_order',
        //'items',
        'email',
        'first_name',
        'last_name',
        'address',
        'phone',
        'notes',
        'total',
        'order_status', 
        'payment_method',
        'midtrans_order_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class)->with('product');
    }
    public function adresses()
    {
        return $this->hasMany(addres::class);
    }
    protected $casts = [
        'paid_at' => 'datetime',
        //'items' => 'array',
    ];
}
