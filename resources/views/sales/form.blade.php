<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Top Theater for Sales</title>
</head>
<body>
<h1>Find Top Theater for Sales</h1>

<form action="{{ route('sales.findTop') }}" method="POST">
    @csrf
    <label for="date">Enter a calendar date (MM/DD/YYYY). Example: 11/7/2024:</label>
    <input type="text" id="date" name="date" value="11/7/2024" required placeholder="e.g. 11/7/2024">

    @if ($errors->has('date'))
        <div style="color: red;">
            <strong>{{ $errors->first('date') }}</strong>
        </div>
    @endif

    <button type="submit">Find Top Theater</button>
</form>
</body>
</html>
