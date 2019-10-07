<?php

namespace App\Http\Controllers\User;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Book;

class BookCategoryController extends Controller
{
    public function index($id)
    {
        try {
            $category = Category::findOrFail($id);
        }catch (ModelNotFoundException $exception) {
            return view('errors.notfound');
        }

        $books = Book::with('rates', 'publisher')
            ->where('category_id', $id)
            ->paginate(config('limitdata.category'));

        return view('user.book-category', compact('category', 'books'));

    }
}
