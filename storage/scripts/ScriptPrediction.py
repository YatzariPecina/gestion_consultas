import sys
import joblib
import json

# Cargar el modelo pkl
with open("D:\\Sistemas inteligentes\\Proyecto 1\\magic_wand_model\\notebook\magic_wand.pkl", 'rb') as file:
    modelo = joblib.load(file)
    
    # Leer los datos de los argumentos de línea de comandos
if len(sys.argv) > 1:
    input_data = json.loads(sys.argv[1])  # Decodifica el JSON recibido

    # Hacer la predicción
    prediction = modelo.predict([input_data])
    
    # Mostrar la predicción en la consola
    print(f"Predicción para los datos: {prediction}")
else:
    print("No se recibieron datos.")
