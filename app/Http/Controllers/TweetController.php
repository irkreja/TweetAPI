<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->tweets()->with(['user'])->latest()->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|min:4',
        ]);
        $tweet = $request->user()->tweets()->create([
            'body' => $request->body
        ])->load(['user']);

        return $tweet;
    }

}
