<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    /**
     * Has Many Options
     * @return HasMany
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    /**
     * Belongs To Product
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
