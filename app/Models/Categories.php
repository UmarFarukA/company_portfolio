<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];
    protected $increment = false;

    public function blogs(): HasMany
    {
        return $this->hasMany(Blogs::class);
    }
}
