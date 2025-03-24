<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FlowerTab extends Model
{
    /** @use HasFactory<\Database\Factories\FlowerTabFactory> */
    use HasFactory;

    protected $fillable = [
        'label', 'description'
    ];
    
    public function flower(): BelongsTo
    {
        return $this->belongsTo(Flower::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
