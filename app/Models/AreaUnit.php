<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaUnit extends Model
{
    protected $guarded = [];
    /**
     * Area Unit has many a Properties
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function properties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Property::class);
    }
}
