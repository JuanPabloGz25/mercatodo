<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function request;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'category',
        'brand',
        'line',
        'model',
        'color',
        'transmission',
        'kilometre',
        'engine',
        'fuel',
        'torque',
        'power',
        'price',
        'stock',
        'description',
        'image',
    ];

    public function scopeSearch(Builder $query): Builder
    {
        return $query->when(request()->filled('search'), function ($query) {
            $search = request('search');
            $query->where('category', 'LIKE', '%' . $search . '%')
                ->orWhere('brand', 'LIKE', '%' . $search . '%')
                ->orWhere('model', 'LIKE', '%' . $search . '%')
                ->orWhere('color', 'LIKE', '%' . $search . '%')
                ->orWhere('transmission', 'LIKE', '%' . $search . '%')
                ->orWhere('fuel', 'LIKE', '%' . $search . '%')
                ->orWhere('line', 'LIKE', '%' . $search . '%');
        });
    }

    public function getFullDescriptionAttribute(): string
    {
        return $this->attributes['brand']
            . ' ' . $this->attributes['line']
            . ' ' . $this->attributes['model']
            . ' ' . $this->attributes['color']
            . ' ' . $this->attributes['transmission'];
    }

    public function getFormattedPriceAttribute(): string
    {
        return number_format($this->attributes['price'], 0, ',', '.');
    }

}
