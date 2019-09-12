<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $newUpdatedBooks = Book::with('publisher', 'rates')->orderBy('id', 'DESC')
            ->take(config('limitdata.new_updated_books'))
            ->get();

        $highestViewedBooks = Book::with('publisher', 'rates')->orderBy('view', 'DESC')
            ->take(config('limitdata.highest_viewed_books'))
            ->get();

        return view('user.home', compact('newUpdatedBooks', 'highestViewedBooks'));
    }

}
