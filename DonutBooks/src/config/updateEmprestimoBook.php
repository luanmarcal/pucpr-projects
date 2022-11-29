<?php

if (isset($_POST['confirmar'])) {
    if ($_POST['data_inicial'] == "" || $_POST['data_final'] == "") {
        echo "<p>Preencha todos os campos!</p>";
    } else if($_POST['data_inicial'] <= date('Y-m-d')) {
        echo "<p>A data de início deve ser maior que a data atual!</p>";
    } else if($_POST['data_final'] <= $_POST['data_inicial']) {
        echo "<p>A data de entrega deve ser maior que a data de início!</p>";
    } else {
        $id = $_GET['id'];

        //update status
        $sql_code = "UPDATE livros_cadastrados SET status = '1' WHERE id = '$id'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        //get name book
        $sql_code = "SELECT * FROM livros_cadastrados WHERE id = '$id'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        while ($row = $sql_query->fetch_assoc()) {
            $titulo = $row['titulo'];
            $proprietario = $row['proprietario'];
        }

        // create new row in table emprestimos
        $sql_code = "INSERT INTO livros_emprestados (id, titulo, proprietario, data_inicial, data_final, destinatario, contato, status) VALUES ('$id', '$titulo', '$proprietario', '$_POST[data_inicial]', '$_POST[data_final]', '$_SESSION[nome]', '$_SESSION[email]', '1')";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        // Inserindo a ação no histórico
        $sql_code = "INSERT INTO historico (titulo, data, usuario, acao) VALUES ('$titulo', NOW(), '$_SESSION[nome]', '1')";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        header("Location: ./home.php");
    }
}
?>