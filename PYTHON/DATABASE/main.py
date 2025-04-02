from database import Database

# Crear una instancia de la base de datos
db = Database()
conn = db.get_connection()

if conn:
    try:
        cursor = conn.cursor()
        cursor.execute("SELECT NOW();")
        result = cursor.fetchone()
        print("Fecha y hora actual:", result[0])
    except Exception as e:
        print("Error en la consulta:", e)
    finally:
        db.close_connection()
