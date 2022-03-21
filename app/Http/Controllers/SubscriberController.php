<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function getSubscribers(Request $request)
    {
        return Subscriber::all()->load(['website']);
    }

    /**
     * @param Request $request
     * @param Website $website
     * @return Model
     */
    public function subscribeToWebsite(Request $request, Website $website)
    {
        $validated = $request->validate([
            'email'=>'required|email',
        ]);

        return $website->subscribers()->create($validated);
    }
}
