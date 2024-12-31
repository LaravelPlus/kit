<?php

namespace App\Models;

use Database\Factories\NavbarFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Navbar extends Model
{
    /** @use HasFactory<NavbarFactory> */
    use HasFactory;

    protected $table = 'navbar';
    protected $fillable = [
        'title',
        'url',
        'icon',
        'parent_id',
        'order',
        'is_active',
    ];

    /**
     * Relationship to get child items.
     */
    public function children(): HasMany
    {
        return $this->hasMany(Navbar::class, 'parent_id')->orderBy('order');
    }

    /**
     * Relationship to get the parent item.
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Navbar::class, 'parent_id');
    }
}
