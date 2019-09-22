<?php

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$nombreUsuario = $_POST['nombreUsuario'];

// detalles de la conexion
$conn_string = "host=http://127.0.0.1 port=39339 dbname=dbpersona user=coba password=toor";

// establecemos una conexion con el servidor postgresSQL
$dbconn = pg_connect($conn_string);

// Revisamos el estado de la conexion en caso de errores.
if(!$dbconn) {
    echo "Error: No se ha podido conectar a la base de datos\n";
} else {
    echo "Conexión exitosa\n";
}

// Close connection
pg_close($dbconn);

