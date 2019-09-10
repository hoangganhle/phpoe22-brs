<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\AuthorBook;

class BookAuthorController extends Controller
{
    public function index($id)
    {
        try {
            $author = Author::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }

        $bookAuthor = AuthorBook::where('author_id', '=', $id)->pluck('book_id');
        $books = Book::with('rates', 'publisher')
            ->whereIn('id', $bookAuthor)
            ->paginate(config('limitdata.category'));

        return view('user.book-author', compact('books', 'author'));
    }
}
