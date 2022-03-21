<?php

namespace App\Models;

use App\Events\PostCreated;
use App\Jobs\SendEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $fillable=[
        'title','description','website_id'
    ];

    public static function boot()
    {
        parent::boot();
        static::created(function($post){
            PostCreated::dispatch($post);
        });
    }


    /**
     * @return BelongsTo
     */
    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    /**
     * @return BelongsToMany
     */
    public function subscribers()
    {
        return $this->belongsToMany(Subscriber::class, 'subscriber_post', 'post_id', 'subscriber_id');
    }
}
