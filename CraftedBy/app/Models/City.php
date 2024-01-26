<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperCity
 */
class City extends Model
{
    use HasFactory, HasUuids;
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cities';

    protected $fillable = [
        'name',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function business(): HasMany
    {
        return $this->hasMany(Business::class);
    }
}
