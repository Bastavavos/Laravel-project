<?php

namespace App\Models;

use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @mixin IdeHelperProduct
 */

/**
 * @OA\Schema(schema="Product",
 *     @OA\Property(property="name", type="string"),
 *     @OA\Property(property="image_path", type="string"),
 *     @OA\Property(property="price", type="number"),
 *     @OA\Property(property="stock", type="integer"),
 *     @OA\Property(property="active", type="tinyint"),
 *     @OA\Property(property="description", type="string"),
 *     @OA\Property(property="color_id", type="string", format="uuid"),
 *     @OA\Property(property="material_id", type="string", format="uuid"),
 *     @OA\Property(property="style_id", type="string", format="uuid"),
 *     @OA\Property(property="category_id", type="string", format="uuid"),
 *     @OA\Property(property="size_id", type="string", format="uuid"),
 *     @OA\Property(property="business_id", type="string", format="uuid")
 * )
 */

class Product extends Model
{
    use HasFactory, HasUuids, Filterable, Sortable;

    protected $fillable = [
        'name',
        'image',
        'price',
        'stock',
        'active',
        'description',
        'user_id',
        'color_id',
        'material_id',
        'style_id',
        'category_id',
        'size_id',
    ];

    public function artisan(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }


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
