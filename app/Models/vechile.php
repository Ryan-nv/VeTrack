<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class vechile extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function order() : HasMany {
        return $this->hasMany(order::class, 'id_vechile');
    }
}
