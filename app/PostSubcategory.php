<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostSubcategory extends Model
{
    /**
     * Belongs To Category
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
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
