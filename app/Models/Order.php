<?php

namespace App\Models;

use App\Models\User;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'chef_id',
        'customer_id',
        'product_id',
        'quantity',
        'type',
        'status',
    ];

    public function chef(){
        return $this->belongsTo(User::class, 'chef_id');
    }

    public function customer(){
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function product(){
        return $this->belongsTo(Products::class, 'product_id');
    }
}
