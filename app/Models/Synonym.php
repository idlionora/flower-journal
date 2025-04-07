<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Synonym extends Model
{
    /** @use HasFactory<\Database\Factories\SynonymFactory> */
    use HasFactory;

    protected $fillable = [
        'name'        
    ];

    public function flower(): BelongsTo
    {
        return $this->belongsTo(Flower::class);
    }
}
