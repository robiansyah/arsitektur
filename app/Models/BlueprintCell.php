<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'blueprint_id',
    'construct_id',
    'cognitive_level',
    'target_item_count',
    'target_difficulty_min',
    'target_difficulty_max',
    'weight',
])]
class BlueprintCell extends Model
{
    public function blueprint(): BelongsTo
    {
        return $this->belongsTo(Blueprint::class);
    }

    public function construct(): BelongsTo
    {
        return $this->belongsTo(Construct::class);
    }
}
