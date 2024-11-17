@extends('layouts.main')

@section('title', 'Top Theater for Sales')

@section('content')
    <h1>Top Theater for Sales on {{ \Carbon\Carbon::parse($date)->format('F j, Y') }}</h1>

    <h2>Theater: {{ $topTheater->theater_name }}</h2>
    <p>Total Sales: ${{ number_format($topTheater->total_sales, 2) }}</p>

    @if(isset($filmOfTheDay))
        <h3>Film of the Day: {{ $filmOfTheDay->title }}</h3>
        <p>Today is a good day. Take a rest and watch <b>{{ $filmOfTheDay->title }}</b>.</p>
        <p>Description: {{ $filmOfTheDay->description }}</p>
    @endif

    <a href="{{ route('sales.form') }}">Search Again</a>
@endsection
