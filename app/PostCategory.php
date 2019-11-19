<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostCategory extends Model
{
    /**
     * Has Many Subcategories
     * @return HasMany
     */
    public function categories()
    {
        return $this->hasMany(PostSubcategory::class);
    }

    /**
     * Has Many Posts
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
