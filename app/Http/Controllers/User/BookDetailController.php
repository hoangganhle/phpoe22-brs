<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\VoteRequest;
use App\Models\Book;
use App\Models\Rate;
use App\Models\Review;
use Auth;

class BookDetailController extends Controller
{
    public function index($id)
    {
        try {
            $book = Book::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }

        if (Auth::check()) {
            $userRateBook = Rate::where([
                ['user_id', '=', Auth::user()->id],
                ['book_id', '=', $id],

            ])->first();
        }else {
            $userRateBook = "";
        }

        $reviews = Review::with('user', 'comments', 'book')
            ->where('book_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('user.book-detail', compact('book', 'userRateBook', 'reviews'));
    }

    public function readBook($id)
    {
        try {
            $book = Book::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }

        return view('user.book-read', compact('book'));
    }

    public function voteBook(VoteRequest $request, $id)
    {
        $rate = new Rate;
        $rate->book_id = $id;
        $rate->user_id = Auth::user()->id;
        $rate->stars = count($request->get('star'));
        $rate->save();

       return redirect()->back();
    }

    public function reviewBook(Request $request, $id)
    {
        try {
            $book = Book::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }

        Review::create([
            'review_content' => $request->get('review'),
            'user_id' => Auth::user()->id,
            'book_id' => $id,

        ]);

        $reviews = Review::with('user', 'comments', 'book')
            ->where('book_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $returnHTML = view('user.book-reviews')->with('reviews', $reviews)->render();

        return response()->json(array('success' => true, 'html'=>$returnHTML));

    }
}
