<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'organization_id',
    'name',
    'purpose',
    'response_model',
    'default_irt_model',
    'delivery_default',
    'version',
    'status',
])]
class Instrument extends Model
{
    public function organization(): BelongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function blueprints(): HasMany
    {
        return $this->hasMany(Blueprint::class);
    }

    public function forms(): HasMany
    {
        return $this->hasMany(Form::class);
    }
}
