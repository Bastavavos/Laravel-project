<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperProduct
 */
class Product extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'image',
        'price',
        'stock',
        'active',
        'description',
        'color_id',
        'material_id',
        'style_id',
        'size_id',
        'category_id',
        'business_id'
    ];

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function style(): BelongsTo
    {
            return $this->belongsTo(Style::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function size(): BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}
