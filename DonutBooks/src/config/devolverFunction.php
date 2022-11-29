<?php
include('database.php');

if (!isset($_SESSION)) {
    session_start();
}

$sql_code = "SELECT * FROM livros_emprestados WHERE status = '1'";
$sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

if ($sql_query->num_rows > 0) {
    $flag = 0;
    while ($row = $sql_query->fetch_assoc()) {
        if ($row['destinatario'] === $_SESSION['nome']) {
            $flag = 1;
            echo "<tr>";
            echo "<td>" . $row['titulo'] . "</td>";
            echo "<td>" . $row['proprietario'] . "</td>";
            echo "<td>" . $row['data_inicial'] . "</td>";
            echo "<td>" . $row['data_final'] . "</td>";
            echo "<td><button type=submit value=$row[id] name=selecionar>devolver</button></td>";
            echo "</tr>";
        } 
    }
    if ($flag === 0) {
        echo "<tr>";
        echo "<td colspan=5>Nenhum livro emprestado</td>";
        echo "</tr>";
    }
} else {
    echo "<tr>";
    echo "<td colspan='5'>Nenhum livro emprestado</td>";
    echo "</tr>";
}

if (isset($_POST['selecionar'])) {
    $id = $_POST['selecionar'];

    //get titulo database
    $sql_code = "SELECT * FROM livros_emprestados WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
    $row = $sql_query->fetch_assoc();
    $titulo = $row['titulo'];

    //remove o livro da tabela de emprestados
    $sql_code = "DELETE FROM livros_emprestados WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    $sql_code = "UPDATE livros_cadastrados SET status = '0' WHERE id = '$id'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    // Inserindo a ação no histórico
    $sql_code = "INSERT INTO historico (titulo, data, usuario, acao) VALUES ('$titulo', NOW(), '$_SESSION[nome]', '0')";
    $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

    header("Location: ../views/devolver.php");
}

?>