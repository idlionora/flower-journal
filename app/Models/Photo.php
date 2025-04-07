<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Photo extends Model
{
    /** @use HasFactory<\Database\Factories\PhotoFactory> */
    use HasFactory;

    protected $fillable = [
        'alt_text', 'source'        
    ];

    public function flower(): BelongsToMany
    {
        return $this->belongsToMany(Flower::class, 'flower_table')->withTimestamps();
    }
}
