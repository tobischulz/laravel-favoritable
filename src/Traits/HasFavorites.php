<?php

namespace TobiSchulz\Favoritable\Traits;

trait HasFavorites
{
    /**
    * Define a morph-many relationship.
    *
    * @return \Illuminate\Database\Eloquent\Relations\MorphedByMany
    */
    public function favorites($modelClass)
    {
        return $this->morphedByMany($modelClass, 'favoriteable', 'favorites', 'user_id');
    }
}
