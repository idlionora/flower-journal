<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Flower extends Model
{
    /** @use HasFactory<\Database\Factories\FlowerFactory> */
    use HasFactory;

    protected $fillable = [
        'name_common', 'name_species', 'photo_path', 'photo_title', 'classification_title'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
