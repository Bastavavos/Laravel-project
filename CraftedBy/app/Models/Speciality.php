<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperSpeciality
 */
class Speciality extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'specialities';

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function business(): BelongsToMany
    {
        return $this->belongsToMany(Business::class);
    }
}
