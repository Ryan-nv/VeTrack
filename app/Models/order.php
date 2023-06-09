<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'id_supervisor');
    }
    public function driver() : BelongsTo {
        return $this->belongsTo(Driver::class, 'id_driver');
    }
    public function vechile() : BelongsTo {
        return $this->belongsTo(vechile::class, 'id_vechile');
    }
}
