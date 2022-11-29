<?php
include('database.php');

if (!isset($_SESSION)) {
    session_start();
}

//get parameter id from url
$id = $_GET['id'];

$sql_code = "SELECT * FROM livros_cadastrados WHERE id = '$id'";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

while ($row = $sql_query->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['titulo'] . "</td>";
    echo "<td>" . $row['proprietario'] . "</td>";
    echo "<td> <input class=input type=date name=data_inicial placeholder=></td>";
    echo "<td> <input class=input type=date name=data_final placeholder=></td>";
    echo "</tr>";
}
?>