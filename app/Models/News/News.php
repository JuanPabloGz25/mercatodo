<?php

namespace App\Models\News;

use App\Models\NewsVisit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'content',
        'author',
        'date',
        'category',
    ];

    public function newsVisit(): HasMany
    {
        return $this->hasMany(NewsVisit::class);
    }
}
