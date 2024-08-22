<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prediccion</title>
</head>

<body>
    <h1>Resultado de la predicción</h1>
    <div class="my-4">
        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession
    </div>
    <div>
        @foreach ($data as $row)
            <tr>
                @foreach ($row as $cell)
                    <td>{{ $cell }}</td>
                @endforeach
            </tr>
        @endforeach
    </div>
</body>
@push('scripts')
    <script>
        Echo.channel('csv-updates')
            .listen('.csv-updated', (e) => {
                console.log(e.message);
                // Recarga la página para obtener los nuevos datos
                location.reload();
            });
    </script>
@endpush

</html>
