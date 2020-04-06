<?php

namespace App\Eloquent;

class Tweet extends UuidModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'user_uuid',
    ];

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
