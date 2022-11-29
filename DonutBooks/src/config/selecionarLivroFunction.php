<?php
include('database.php');

$sql_code = "SELECT * FROM livros_cadastrados WHERE status = '0'";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

if ($sql_query->num_rows > 0) {
    while ($row = $sql_query->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['titulo'] . "</td>";
        echo "<td>" . $row['autor'] . "</td>";
        echo "<td>" . $row['proprietario'] . "</td>";
        echo "<td><button  type=submit value=$row[id] name=selecionar>selecionar</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td colspan='5'>Nenhum livro disponível</td>";
    echo "</tr>";
}

if (isset($_POST['selecionar'])) {
    //get value of button
    $id = $_POST['selecionar'];

    //pass book id as parameter to another page
    header("Location: ../views/confirmarEmprestimo.php?id=$id");
}
?>