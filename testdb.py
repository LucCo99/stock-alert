import mysql.connector

# MySQL database connection settings
db_config = {
    "host": "localhost",  # Replace with your database host
    "user": "root",       # Replace with your database username
    "password": "EeL48!b=nD/W",       # Replace with your database password
    "database": "stock_checks",  # Use the correct database name
    "charset": "utf8mb4"  # Force utf8mb4 charset (optional, but helps with compatibility)
}

def test_db_connection():
    connection = None  # Initialize the connection variable

    try:
        # Attempt to establish a connection
        connection = mysql.connector.connect(**db_config)
        
        if connection.is_connected():
            print("Connection to the database was successful!")
        else:
            print("Failed to connect to the database.")
    
    except mysql.connector.Error as err:
        print(f"Error: {err}")
    
    finally:
        if connection and connection.is_connected():
            connection.close()
            print("Database connection closed.")

# Run the test
test_db_connection()
