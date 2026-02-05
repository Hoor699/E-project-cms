<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    protected $fillable = [
        'tracking_no',
        'agent_id', 
        'sender_name', 
        'sender_email',
        'receiver_name',
        'sender_phone',
        'from_city', 
        'to_city',
        'weight', 
        'price', 
        'status'
    ];
    
}
