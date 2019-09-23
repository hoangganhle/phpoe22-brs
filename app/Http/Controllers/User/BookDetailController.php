<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;

class BookDetailController extends Controller
{
    public function index($id)
    {
        try {
            $book = Book::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }


        return view('user.book-detail', compact('book'));
    }
}
