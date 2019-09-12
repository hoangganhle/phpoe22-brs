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
