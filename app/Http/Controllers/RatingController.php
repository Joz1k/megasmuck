<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class RatingController extends Controller
{
    public function __construct()
    {
        $this->middleware('user');
    }
    public function index()
    {
        $rating = Rating::where('user_id', Auth::user()->id)->first();
        return view('profile.points', compact('rating'));
    }
    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request, Rating $rating)
    {
        $data = $request->validate([
            'rating' => 'required',
        ]);

        auth()->user()->update([
            'socialcredits' => 50,
        ]);

        return Response::json($rating->getUser()->create([
            'user_id' => Auth::user()->id,
            'rating' => $request->rating,
        ]));
    }
}
