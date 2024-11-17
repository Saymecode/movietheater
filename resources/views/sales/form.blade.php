@extends('layouts.main')

@section('title', 'Find Top Theater for Sales')

@section('content')
    <h1>Find Top Theater for Sales</h1>
    <form action="{{ route('sales.findTop') }}" method="POST">
        @csrf
        <label for="date">Enter a calendar date (MM/D/YYYY). Example: 11/7/2024:</label>
        <input type="text" id="date" name="date" value="11/7/2024" required placeholder="e.g. 11/7/2024">

        <button type="submit">Find Top Theater</button>

        @if ($errors->has('date'))
            <div style="color: red;">
                <strong>{{ $errors->first('date') }}</strong>
            </div>
        @endif
    </form>
@endsection
