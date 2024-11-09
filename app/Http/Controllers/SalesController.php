<?php

namespace App\Http\Controllers;

use App\Models\DailySale;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function showForm()
    {
        return view('sales.form');
    }

    public function findTopTheater(Request $request)
    {
        $request->validate([
            'date' => 'required|date_format:n/j/Y',
        ], [
            'date.date_format' => 'The date field must match the format MM/D/YYYY.',
        ]);

        $date = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d');

        $topTheater = DailySale::join('theaters', 'daily_sales.theater_id', '=', 'theaters.id')
            ->select('theaters.name as theater_name', DB::raw('SUM(daily_sales.sales) as total_sales'))
            ->whereDate('daily_sales.date', $date)
            ->groupBy('daily_sales.theater_id')
            ->orderByDesc('total_sales')
            ->first();

        $today = Carbon::today()->format('Y-m-d');
        $filmOfTheDayExisted = Movie::where('film_of_the_day', true)->first();

        if (!$filmOfTheDayExisted || $filmOfTheDayExisted->film_of_the_day_updated_date !== $today) {
            $randomMovie = Movie::inRandomOrder()->first();
            $randomMovie->film_of_the_day = true;
            $randomMovie->film_of_the_day_updated_date = $today;
            $randomMovie->save();
            $filmOfTheDay = $randomMovie;

            Movie::where('id', '!=', $randomMovie->id)->where('film_of_the_day', true)->update(['film_of_the_day' => false]);
        }

        if ($topTheater) {
            return view('sales.result', [
                'topTheater' => $topTheater,
                'date' => $date,
                'filmOfTheDay' => $filmOfTheDay ?? $filmOfTheDayExisted,
            ]);
        } else {
            return back()->withErrors(['date' => 'No sales data found for the given date.']);
        }
    }
}
