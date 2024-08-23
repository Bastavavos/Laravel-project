<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @mixin IdeHelperZipCode
 */
class ZipCode extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'zip_codes';

    protected $fillable = [
        'value',
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

}
