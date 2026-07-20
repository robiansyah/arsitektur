<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'framework_id',
    'parent_id',
    'level',
    'code',
    'name',
    'conceptual_definition',
    'operational_definition',
    'direction',
    'version',
    'status',
])]
class Construct extends Model
{
    public function framework(): BelongsTo
    {
        return $this->belongsTo(Framework::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function blueprintCells(): HasMany
    {
        return $this->hasMany(BlueprintCell::class);
    }
}
