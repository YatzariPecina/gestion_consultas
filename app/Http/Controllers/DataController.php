<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    public function receiveData(Request $request)
    {
        $ruta = storage_path('datasets/');
        // Verificar si la solicitud es POST
        if ($request->isMethod('post')) {
            // Obtener los datos JSON enviados
            $json_data = $request->getContent();

            // Decodificar los datos JSON
            $data = json_decode($json_data, true);

            // Verificar si la decodificación fue exitosa
            // Verificar si la decodificación fue exitosa
            if (json_last_error() === JSON_ERROR_NONE) {

                $archivo = $ruta . "dataset.csv";

                // Verifica si el directorio existe, si no, crea el directorio
                if (!file_exists($ruta)) {
                    mkdir($ruta, 0755, true);
                }

                // Abre el archivo en modo apilamiento
                $manejadorArchivo = fopen($archivo, 'a');

                // Manda al archivo la nueva información
                fputcsv($manejadorArchivo, $data['dataset']);

                fclose($manejadorArchivo); // Cierra el archivo después de escribir

                return response()->json(['message' => 'Datos recibidos exitosamente']);
            } else {
                return response()->json(['error' => 'Error al decodificar JSON'], 400);
            }
        } else {
            return view('ML.recibe-data', ['message' => 'Es para descargar']);
        }
    }

    public function actualizarData(Request $request)
    {
        $ruta = storage_path('datasets/');

        $archivo = $ruta . 'dataset.csv';

        if (file_exists($archivo)) {
            unlink($archivo);
        }

        $file = $request->file('file');
        $file->move($ruta, 'dataset.csv');
        return redirect()->route('dataset')->withSuccess('Archivo actualizado');
    }

    public function predecir(Request $request)
    {
        $ruta = storage_path('scripts/');
        if ($request->isMethod('post')) {
            // Obtener los datos JSON enviados
            $json_data = $request->getContent();

            $storagePath = storage_path();
            $escapedStoragePath = escapeshellarg($storagePath);
            $escapedJsonData = escapeshellarg($json_data);
            $comando = "python3 {$ruta}ScriptPrediction.py {$escapedStoragePath} {$escapedJsonData}";
            exec($comando, $output, $return_var);

            $output_string = implode("\n", $output);
            $processedData = [$output_string];

            // Almacena los datos procesados en la sesión
            Session::put('processed_data', $processedData);

            // Redirige a la vista Blade con los datos procesados
            return redirect()->route('predecir');
        }

        // Redirigir a la vista con valores vacíos si no se envió una solicitud POST
        return view('ML.prediccion', [
            'output' => ''
        ]);
    }
}
