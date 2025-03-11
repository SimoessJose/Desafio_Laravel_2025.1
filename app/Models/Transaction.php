<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */ 
    protected $fillable = [
        'quantity',
        'date',
        'price',
        //'reference_id',
        //'status',
        'product_id',
        'buyer_id',
    ];
}
