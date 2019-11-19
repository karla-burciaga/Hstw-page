<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
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
     * Belongs To Subcategory
     * @return BelongsTo
     */
    public function subcategory()
    {
        return $this->belongsTo(PostSubcategory::class, 'post_subcategory_id');
    }
}
