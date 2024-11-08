<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Theater for Sales</title>
</head>
<body>
<h1>Top Theater for Sales on {{ \Carbon\Carbon::parse($date)->format('F j, Y') }}</h1>

<h2>Theater: {{ $topTheater->theater_name }}</h2>
<p>Total Sales: ${{ number_format($topTheater->total_sales, 2) }}</p>

<a href="{{ route('sales.form') }}">Search Again</a>
</body>
</html>
