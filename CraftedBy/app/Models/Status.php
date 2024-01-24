<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Status extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'status';

    public $timestamps = false;


    protected $fillable = [
        'name',
        'number',
    ];

    public function invoices(): BelongsToMany
    {
        return $this->belongsToMany(Invoice::class);
    }
}
