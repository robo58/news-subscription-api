<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function getPosts(Request $request)
    {
        return Post::all()->load(['website']);
    }


    /**
     * @param Request $request
     * @param Website $website
     * @return Model
     */
    public function createPost(Request $request, Website $website)
    {
        $validated = $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
        ]);
        return $website->posts()->create($validated);
    }
}
