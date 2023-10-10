<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug'
    ]; //fillable kolom mana yang dapat di isi pada database dan memastikan filld ini aman untuk di simpan dengan cara 

    public function items(){
        return $this->hasMany(Item::class);
    }
}
