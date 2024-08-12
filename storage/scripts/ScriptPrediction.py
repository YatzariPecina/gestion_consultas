import sys
import joblib
import json
from sklearn import preprocessing

# Cargar el modelo pkl
with open("storage\scripts\magic_wand.pkl", 'rb') as file:
    modelo = joblib.load(file)
    
    # Leer los datos de los argumentos de línea de comandos
if len(sys.argv) > 1:
    input_data = json.loads(sys.argv[1])  # Decodifica el JSON recibido

    standarizer = preprocessing.StandardScaler()
    nuevos_datos_standar = standarizer.transform(input_data)

    # Hacer la predicción
    prediction = modelo.predict([nuevos_datos_standar])
    
    # Mostrar la predicción en la consola
    print(f"Predicción para los datos: {prediction}")
else:
    print("No se recibieron datos.")
