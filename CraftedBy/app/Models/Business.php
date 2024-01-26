<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperBusiness
 */
class Business extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'business';

    protected $fillable = [
        'email',
        'zip_code_id',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function owner(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_business');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function zipCode(): BelongsTo
    {
        return $this->belongsTo(ZipCode::class);
    }
    public function theme(): BelongsTo
    {
        return $this->belongsTo(Theme::class);
    }

    public function speciality(): BelongsToMany
    {
        return $this->belongsToMany(Speciality::class);
    }
}
