<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subscriber extends Model
{
    protected $fillable=[
        'email', 'website_id'
    ];

    public function website(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Website::class);
    }

    /**
     * @return BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'subscriber_post', 'subscriber_id', 'post_id');
    }

    public function didNotReceivePost(Post $post): bool
    {
        return $this->posts()->where('posts.id', '=', $post->id)->count()===0;
    }
}
