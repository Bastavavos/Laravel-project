<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperInvoice
 */
class Invoice extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'customer_id'
        ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function status(): BelongsToMany
    {
        return $this->belongsToMany(Status::class)
            ->withTimestamps();
    }

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('quantity');
    }
}
