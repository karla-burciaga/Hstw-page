<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductImage extends Model
{
    /**
     * Image belongs to product
     * @return BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::Class);
    }
}
