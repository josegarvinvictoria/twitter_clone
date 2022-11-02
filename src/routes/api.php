<?php

use App\Http\Controllers\Api\Tweets\TweetController;
use App\Http\Controllers\Api\Timeline\TimelineController;

Route::get('/timeline', [TimelineController::class, 'index']);

Route::post('/tweets', [TweetController::class, 'store']);

