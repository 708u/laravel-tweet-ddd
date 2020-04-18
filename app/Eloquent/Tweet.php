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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * PostedPictures Relationship.
     *
     * @return  \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function postedPicture()
    {
        return $this->hasMany(PostedPicture::class);
    }

    /**
     * get specified user's tweets.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param string $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePostedBy($query, string $userId)
    {
        return $query->where('user_uuid', $userId);
    }
}
