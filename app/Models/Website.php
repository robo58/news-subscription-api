<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $fillable=[
      'title','url'
    ];


    public function posts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function subscribers(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Subscriber::class);
    }
}
