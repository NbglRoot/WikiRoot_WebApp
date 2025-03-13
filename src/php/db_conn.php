<?php
$HOST = 'localhost';
$USER = 'root';
$PASS = '';
$DDBB = 'wikirootweb';

// crear conexión a la base de datos
$conn = mysqli_connect($HOST, $USER, $PASS, $DDBB);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
