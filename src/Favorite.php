<?php

namespace TobiSchulz\Favoritable;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'favorites';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
    ];

    /**
     * Returns the relatied user
     *
     * @return \Elisana\Base\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
