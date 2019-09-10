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

        return view('user.book-detail', compact('book', 'userRateBook'));
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
}
