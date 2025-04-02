import mysql.connector
import psycopg2
from config import DB_CONFIG

class Database:
    def __init__(self):
        self.connection = None
        try:
            if DB_CONFIG["connection"] == "mysql":
                self.connection = mysql.connector.connect(
                    host=DB_CONFIG["host"],
                    database=DB_CONFIG["dbname"],
                    user=DB_CONFIG["user"],
                    password=DB_CONFIG["password"]
                )
            elif DB_CONFIG["connection"] == "pgsql":
                self.connection = psycopg2.connect(
                    host=DB_CONFIG["host"],
                    dbname=DB_CONFIG["dbname"],
                    user=DB_CONFIG["user"],
                    password=DB_CONFIG["password"]
                )
            else:
                raise ValueError("Tipo de conexión no soportado")

            print("Conexión exitosa a la base de datos.")

        except Exception as e:
            print(f"Error de conexión: {e}")

    def get_connection(self):
        return self.connection

    def close_connection(self):
        if self.connection:
            self.connection.close()
            print("Conexión cerrada.")
