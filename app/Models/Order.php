<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customer_name',
        'phone',
        'email',
        'address',
        'total_price',
        'payment_method',
        'status',
    ];

    // nếu sau này có order_items thì để sẵn
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
