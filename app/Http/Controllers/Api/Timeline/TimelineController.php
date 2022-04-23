<?php

namespace App\Http\Controllers\Api\Timeline;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TweetCollection;

class TimelineController extends Controller
{
    public function __construct() {
        $this->middleware(['auth:sanctum']);
    }

    public function index(Request $request) {
        $tweets = $request->user()
            ->tweetsFromFollowing()
            ->latest()
            ->paginate(5);

        return new TweetCollection($tweets);
    }
}
