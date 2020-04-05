<?php

namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
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
