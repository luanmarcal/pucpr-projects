<?php

$host = "localhost";
$database ="donutbooks";
$usuario ="root";
$senha ="";

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>