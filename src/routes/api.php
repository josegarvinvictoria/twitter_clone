<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Tweets\TweetController;
use App\Http\Controllers\Api\Tweets\TweetLikeController;
use App\Http\Controllers\Api\Timeline\TimelineController;

Route::get('/timeline', [TimelineController::class, 'index']);

Route::post('/tweets', [TweetController::class, 'store']);

Route::post('/tweets/{tweet}/likes', [TweetLikeController::class, 'store']);
Route::delete('/tweets/{tweet}/likes', [TweetLikeController::class, 'destroy']);

