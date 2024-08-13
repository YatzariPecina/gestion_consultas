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

    <h1>{{ $message }}</h1>
    
    <h2>Características Enviadas:</h2>
    <pre>{{ $caracteristicas }}</pre>
    
    <h2>Salida del Script:</h2>
    <pre>{{ $output }}</pre>
    
    <h2>Estado del Script:</h2>
    <pre>{{ $return_var }}</pre>
</body>

</html>
