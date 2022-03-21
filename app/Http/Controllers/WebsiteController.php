<?php

namespace App\Http\Controllers;

use App\Models\Website;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * @param Request $request
     * @return Website[]|Collection
     */
    public function getWebsites(Request $request)
    {
        return Website::all();
    }
}
