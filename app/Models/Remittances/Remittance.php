<?php

namespace App\Models\Remittances;

use App\Models\Products\Products;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Remittance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'document',
        'cart_id',
        'status',
        'total',
        'request_id',
        'payment_date',
        'reference',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function cart(): BelongsTo
    {
        return $this->belongsTo(\Cart::class);
    }

    public function products(): BelongsTo
    {
        return $this->belongsTo(Products::class);
    }

}
