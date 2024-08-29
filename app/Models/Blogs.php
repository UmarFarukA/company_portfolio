<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blogs extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [];
    protected $increment = false;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'categories_id');
    }
}
