<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publisher;
use App\Models\Book;

class BookPublisherController extends Controller
{
     public function index($id)
    {
        try {
            $publisher = Publisher::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }

        $books = Book::with('rates', 'publisher')
            ->where('publisher_id', $id)
            ->paginate(config('limitdata.category'));

        return view('user.book-publisher', compact('publisher', 'books'));

    }
}
