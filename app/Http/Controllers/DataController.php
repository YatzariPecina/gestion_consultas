<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

            $escaped_json_data = escapeshellarg($json_data);
            // Ruta al script Python (asegúrate de usar la ruta correcta)
            $comando = "python3 {$ruta}ScriptPrediction.py {$escaped_json_data}";

            // Ejecuta el comando y captura la salida
            exec($comando, $output, $return_var);

            $output_string = implode("\n", $output);

            return redirect()->view('ML.prediccion', [
                'caracteristicas' => $escaped_json_data,
                'output' => $output_string,
                'return_var' => $return_var,
                'message' => 'Predicciones'
            ]);
        }
        return redirect()->view('ML.prediccion', [
            'caracteristicas' => "",
            'output' => '',  // Dejar vacío en GET
            'return_var' => '',
            'message' => 'Predicciones'
        ]);
    }
}
