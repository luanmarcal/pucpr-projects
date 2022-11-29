<?php
include('database.php');

if (isset($_SESSION['id'])) {
    header("Location: ../views/home.php");
}

if (isset($_POST['btnEntrar'])) {

    if (strlen($_POST['email']) == 0) {
        echo "<p>Preencha seu e-mail</p>";
    } else if (strlen($_POST['senha']) == 0) {
        echo "<p>Preencha sua senha</p>";
    } else {

        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        // sha1
        $senha = sha1($senha);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {

            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            $_SESSION['email'] = $usuario['email'];

            header("Location: home.php");

        } else {
            echo "<p>Falha ao logar! E-mail ou senha incorretos</p>";
        }

    }

}
?>