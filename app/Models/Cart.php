<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "carts";
    protected $fillable = [
        'user_id',
        'ticket_id',
        'ticket_number',
        'ticket_price',
        'ticket_quantity',
    ];
}
