<?php

namespace App\Eloquent;

class Tweet extends UuidModel
{
    /**
     * User Relationship.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
