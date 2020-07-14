<?php

namespace TobiSchulz\Favoritable\Traits;

use TobiSchulz\Favoritable\Favorite;

trait HasFavorites
{
    /**
    * Define a one-to-many relationship.
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id');
    }
}
