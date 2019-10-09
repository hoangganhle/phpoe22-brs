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
    function getDataFromRequest($data)
    {
        if (isset($data['image'])) {
            $file_upload = $data['image'];
            $file_upload = $file_upload->move(public_path('images'), $file_upload->getClientOriginalName());
            $fileName = pathinfo($file_upload);
            $data['image'] = $fileName['basename'];
        }

        return $data;
    }
}
