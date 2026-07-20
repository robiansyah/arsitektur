<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['instrument_id', 'name', 'version', 'status'])]
class Blueprint extends Model
{
    public function instrument(): BelongsTo
    {
        return $this->belongsTo(Instrument::class);
    }

    public function blueprintCells(): HasMany
    {
        return $this->hasMany(BlueprintCell::class);
    }
}
