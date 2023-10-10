<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'address',
        'city',
        'zip',
        'status',
        'payment_method',
        'payment_url',
        'payment_status',
        'total_price',
        'item_id',
        'user_id'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];
    
    public function item(){
        $this->belongsTo(Item::class);
    }

    public function user(){
        $this->belongsTo(User::class);
    }
}
