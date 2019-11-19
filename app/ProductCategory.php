<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCategory extends Model
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
     * Has many categories
     * @return HasMany
     */
    public function categories()
    {
        return $this->hasMany(ProductSubcategory::class);
    }
}
