<?php
include('database.php');
if (isset($_POST['btnCadastrar'])) {
    if (strlen($_POST['nome']) == 0) {
        echo "<p>Preencha seu nome</p>";
    } else if (strlen($_POST['email']) == 0) {
        echo "<p>Preencha seu e-mail</p>";
    } else if (strlen($_POST['senha']) == 0) {
        echo "<p>Preencha sua senha</p>";
    } else if (strlen($_POST['confirmar-senha']) == 0) {
        echo "<p>Preencha a confirmação de senha</p>";
    } else if ($_POST['senha'] != $_POST['confirmar-senha']) {
        echo "<p>As senhas não coincidem</p>";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        $nome = $mysqli->real_escape_string($_POST['nome']);

        // sha1
        $senha = sha1($senha);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
        $quantidade = $sql_query->num_rows;
        if ($quantidade == 0) {
            $sql_code = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);
            if ($sql_query) {
                echo "<p>Usuário cadastrado com sucesso!</p>";
            } else {
                echo "<p>Falha ao cadastrar usuário</p>";
            }
        } else {
            echo "<p>Usuário já cadastrado</p>";
        }
    }
}
?>