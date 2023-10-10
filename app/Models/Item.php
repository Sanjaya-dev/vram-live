<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'type_id',
        'brand_id',
        'photos',
        'features',
        'price',
        'star',
        'review'
    ];

    protected $casts = [
        'photos' => 'array'
    ]; //di gunakan untuk menentukan bahwa photo bertipe array aga ketika kita codeing tidak perlu mengkonvert to array

    public function brand(){
        $this->belongsTo(Brand::class);
    } //berelasi dengan table brand

    public function type(){
        $this->belongsTo(Type::class);
    } //berelasi

    public function bookings(){
        $this->hasMany(Booking::class);
    }
}
