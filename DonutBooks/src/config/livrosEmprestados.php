<?php
include('database.php');

$sql_code = "SELECT * FROM livros_emprestados WHERE status = '1'";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

if ($sql_query->num_rows > 0) {
    while ($row = $sql_query->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['titulo'] . "</td>";
        echo "<td>" . $row['destinatario'] . "</td>";
        echo "<td>" . $row['data_inicial'] . "</td>";
        echo "<td>" . $row['data_final'] . "</td>";
        echo "<td>" . $row['contato'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td colspan='5'>Nenhum livro emprestado</td>";
    echo "</tr>";
}


?>