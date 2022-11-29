<?php
include('database.php');

if (!isset($_SESSION)) {
    session_start();
}

$sql_code = "SELECT * FROM historico";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

if ($sql_query->num_rows > 0) {
    while ($row = $sql_query->fetch_assoc()) {

        echo "<tr>";
        echo "<td>" . $row['titulo'] . "</td>";
        echo "<td>" . $row['data'] . "</td>";
        echo "<td>" . $row['usuario'] . "</td>";
        switch ($row['acao']) {
            case 0:
                echo "<td><button disabled>devolveu</button></td>";
                break;
            case 1:
                echo "<td><button disabled>emprestou</button></td>";
                break;
            case 2:
                echo "<td><button disabled>cadastrou livro</button></td>";
                break;
            default:
                break;
        }
        echo "</tr>";

    }
} else {
    echo "<tr>";
    echo "<td colspan='5'>Nenhum histórico de ação disponível</td>";
    echo "</tr>";
}


?>