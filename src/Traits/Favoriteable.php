<?php

namespace TobiSchulz\Favoritable\Traits;

use TobiSchulz\Favoritable\Favorite;

trait Favoriteable
{
    /**
     * Define a polymorphic relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoriteable');
    }

    /**
     * Add this Object to the user favorites.
     *
     * @param int $userId
     */
    public function addFavorite($userId = null)
    {
        $userId = $userId ?: auth()->user()->id;

        $favorite = new Favorite([
            'user_id' => $userId,
        ]);

        $this->favorites()->save($favorite);
    }

    /**
     * Remove this Object from the user favorites.
     *
     * @param int $userId
     *
     */
    public function removeFavorite($userId = null)
    {
        $userId = $userId ?: auth()->user()->id;

        $this->favorites()
            ->where('user_id', $userId)
            ->delete();
    }

    /**
     * Toggle the favorite status from this Object.
     *
     * @param int $userId
     */
    public function toggleFavorite($userId = null)
    {
        $userId = $userId ?: auth()->user()->id;

        $this->isFavorited($userId) ? $this->removeFavorite($userId) : $this->addFavorite($userId);
    }

    /**
     * Check if the user has favorited this Object.
     *
     * @param int $userId
     * @return boolean
     */
    public function isFavorited($userId = null)
    {
        $userId = $userId ?: auth()->user()->id;

        return $this->favorites()
            ->where('user_id', $userId)
            ->exists();
    }

    /**
     * Hooking in delete method to delete all polymorph relationships.
     *
     * @return void
     */
    protected static function bootFavoriteable()
    {
        self::deleting(function ($model) {
            $model->favorites()->delete();
        });
    }
}
