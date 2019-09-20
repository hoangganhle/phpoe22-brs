<?php
use App\Models\Book;

if (!function_exists('avgRate')) {
     function avgRate($bookRate)
    {
        $numberRates = $bookRate->count();
        $totalStars = 0;
        $totalStars = $bookRate->sum('stars');
        $averageStars = ($numberRates != 0) ? floor($totalStars / $numberRates) : 0;

        return $averageStars;
    }
}

if (!function_exists('getDataFromRequest')) {
    function getDataFromRequest($request, $book)
    {
        $book->title = $request['title'];
        $book->book_content = $request['book_content'];
        if (isset($request['image'])) {
            $file_upload = $request['image'];
            $file_upload = $file_upload->move(public_path('images'), $file_upload->getClientOriginalName());
            $fileName = pathinfo($file_upload);
            $book->image = $fileName['basename'];
        }
        $book->number_page = $request['number_page'];
        $book->publisher_id = $request['publisher_id'];
        $book->category_id = $request['category_id'];
        $book->price = $request['price'];

        return $book;
    }
}
