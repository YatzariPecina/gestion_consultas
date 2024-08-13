import sys
import joblib
import json
from sklearn import preprocessing
import os

def main():
    try:
        # Cargar el modelo pkl
        storage_path = sys.argv[1]
        ruta_completa_al_archivo_pkl = os.path.join(storage_path, "scripts", "magic_wand.pkl")

        with open(ruta_completa_al_archivo_pkl, 'rb') as file:
            modelo_scaler = joblib.load(file)
            modelo = modelo_scaler['modelo']
            scaler = modelo_scaler['scaler']

        # Leer los datos de los argumentos de línea de comandos
        if len(sys.argv) > 1:
            input_data = json.loads(sys.argv[2])  # Decodifica el JSON recibido

            if isinstance(input_data, list) and len(input_data) > 0:
                nuevos_datos_standar = scaler.transform(input_data)

                # Hacer la predicción
                prediction = modelo.predict(nuevos_datos_standar)
                
                # Mostrar la predicción en la consola
                print(f"Predicción para los datos: {prediction}")
            else:
                print(f"Datos no válidos para la transformación {input_data}")
                sys.exit(1)  # Código de error
        else:
            print("No se recibieron datos.")
            sys.exit(1)  # Código de error
    except Exception as e:
        # Bloque general para capturar cualquier excepción no manejada previamente
        print(f"Ocurrió un error inesperado: {e}")
        sys.exit(1)  # Código de error

if __name__ == "__main__":
    main()
