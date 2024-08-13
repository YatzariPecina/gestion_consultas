<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediccion</title>
</head>

<body>
    <h1>Response</h1>
    <div class="my-4">
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession
    </div>

    @if(Session::has('processed_data'))
        <ul>
            @foreach(Session::get('output') as $key => $value)
                <li>{{ $key }}: {{ $value }}</li>
            @endforeach
        </ul>
    @endif
</body>

</html>
