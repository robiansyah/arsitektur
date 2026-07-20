<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'description', 'theoretical_basis', 'context', 'version', 'status'])]
class Framework extends Model
{
    public function constructs(): HasMany
    {
        return $this->hasMany(Construct::class);
    }
}
