<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperStyle
 */
class Style extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [

    ];
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
