<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperTheme
 */
class Theme extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'themes';
    public $timestamps = false;

    protected $fillable = [
        'layer',
        'color_hex_1',
        'color_hex_2',
    ];

    public function business(): HasMany
    {
        return $this->hasMany(Business::class);
    }
}
