<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
     /**
     * Has many images
     * @return HasMany
     */
    public function address()
    {
        return $this->hasMany(CustomerAddres::class);
    }
    protected $casts = ['dateOfBirth' => 'date'];
}
