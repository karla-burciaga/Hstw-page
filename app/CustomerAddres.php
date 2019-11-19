<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerAddres extends Model
{

    /**
     * Image belongs to product
     * @return BelongsTo
     */
    public function customer()
    {
        return $this->belongsTo(Customer::Class);
    }
}
