<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductSubcategory extends Model
{
    /**
     * Has many products
     * @return HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Belongs to category
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }
}
