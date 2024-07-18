<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $table = 'roles';

    protected $fillable = [
      'name'
    ];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
