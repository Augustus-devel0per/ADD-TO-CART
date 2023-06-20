<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    use HasFactory;

    protected $table = "tickets";
    protected $fillable = [
        'title',
        'description',
        'ticket_number',
        'date',
        'location',
        'amount',
        'status',
        'ticket_image'
    ];
}
