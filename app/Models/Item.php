<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

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

    public function getThumbnailAttribute() //thumbnail
    {

        if($this->photos){
            // merapihkan file data json
            return Storage::url(json_decode($this->photos)[0]);
        }

        return "https://via.placeholder.com/800x600";

    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    } //berelasi dengan table brand

    public function type(){
       return $this->belongsTo(Type::class);
    } //berelasi

    public function bookings(){
        return $this->hasMany(Booking::class);
    }
}
