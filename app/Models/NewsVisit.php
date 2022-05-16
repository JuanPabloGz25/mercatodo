<?php

namespace App\Models;

use App\Models\News\News;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class NewsVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'new_id',
    ];

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }
}
