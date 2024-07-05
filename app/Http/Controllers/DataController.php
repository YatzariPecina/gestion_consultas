<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataController extends Controller
{
    public function receiveData(Request $request)
    {
        // Verificar si la solicitud es POST
        if ($request->isMethod('post')) {
            // Obtener los datos JSON enviados
            $json_data = $request->getContent();

            // Decodificar los datos JSON
            $data = json_decode($json_data, true);

            // Verificar si la decodificación fue exitosa
            if (json_last_error() === JSON_ERROR_NONE) {
                // Procesar la matriz (ejemplo: guardar en un archivo o en una base de datos)
                file_put_contents(storage_path('data.txt'), print_r($data, true));
                return response()->json(['message' => 'Datos recibidos exitosamente']);
            } else {
                return response()->json(['message' => 'Error al decodificar JSON'], 400);
            }
        } else {
            return response()->json(['message' => 'Método no permitido'], 405);
        }
    }
}
