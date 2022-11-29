<?php
include('database.php');

if (isset($_POST['btnEnviar'])) {

    if (!isset($_SESSION)) {
        session_start();
    }

    if (strlen($_POST['nome']) == 0) {
        echo "<p>Preencha o nome do livro</p>";
    } else if (strlen($_POST['autor']) == 0) {
        echo "<p>Preencha o autor do livro</p>";
    } else {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $autor = $mysqli->real_escape_string($_POST['autor']);

        $sql_code = "SELECT * FROM livros_cadastrados WHERE titulo = '$nome' AND autor = '$autor' AND proprietario = '$_SESSION[nome]' AND status = '0'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 0) {

            $sql_code = "INSERT INTO livros_cadastrados (titulo, autor, proprietario, status) VALUES ('$nome', '$autor', '$_SESSION[nome]', false)";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

            echo "<p>Livro cadastrado com sucesso</p>";

            // Inserindo a ação no histórico
            $sql_code = "INSERT INTO historico (titulo, data, usuario, acao) VALUES ('$nome', NOW(), '$_SESSION[nome]', '2')";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        } else {
            echo "<p>Livro já cadastrado</p>";
        }

    }
}

?>