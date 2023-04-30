<?php

namespace App\Http\Controllers\Api\Tweets;

use App\Events\Tweets\TweetLikesWereUpdated;
use App\Models\Tweet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TweetLikeController extends Controller
{
    public function store(Tweet $tweet, Request $request) {
        // No permitir likear mas de una vez
        if ($request->user()->hasLiked($tweet)) {
            return response(null, 409); // 409 conflict error code
        }
        $request->user()->likes()->create([
            'tweet_id' => $tweet->id
        ]);

        broadcast(new TweetLikesWereUpdated($request->user(), $tweet));
    }

    public function destroy(Tweet $tweet, Request $request) {
        $request->user()->likes->where('tweet_id', $tweet->id)->first->delete();

        broadcast(new TweetLikesWereUpdated($request->user(), $tweet));
    }
}
