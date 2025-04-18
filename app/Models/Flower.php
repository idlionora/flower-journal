<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function classifications(): HasMany
    {
        return $this->hasMany(Classification::class);
    }

    public function flowerTabs(): HasMany
    {
        return $this->hasMany(FlowerTab::class);
    }

    public function photo(): BelongsToMany
    {
        return $this->belongsToMany(Photo::class, 'flower_photo')->withTimestamps();
    }

    public function tag(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'flower_tag')->withTimestamps();
    }

    public function synonyms(): HasMany
    {
        return $this->hasMany(Synonym::class);
    }
}
