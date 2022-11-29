<?php
include('database.php');

if (isset($_POST['btnEnviar'])) {

    if (!isset($_SESSION)) {
        session_start();
    }

    if (strlen($_POST['senha_atual']) == 0) {
        echo "<p>Preencha sua senha</p>";
    } else if (strlen($_POST['nova_senha']) == 0) {
        echo "<p>Preencha sua nova senha</p>";
    } else if (strlen($_POST['confirmar_senha']) == 0) {
        echo "<p>Preencha sua senha novamente</p>";
    } else if ($_POST['nova_senha'] != $_POST['confirmar_senha']) {
        echo "<p>As senhas não coincidem</p>";
    } else {
        $senha = $_POST['senha_atual'];
        $nova_senha = $_POST['nova_senha'];
        $confirmar_senha = $_POST['confirmar_senha'];

        // sha1
        $senha = sha1($senha);
        $nova_senha = sha1($nova_senha);
        $confirmar_senha = sha1($confirmar_senha);

        $sql = "SELECT * FROM usuarios WHERE id = " . $_SESSION['id'];
        $sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL: " . $mysqli->error);


        if ($sql_query->num_rows > 0) {
            while ($row = $sql_query->fetch_assoc()) {
                if ($row['senha'] == $senha) {
                    $sql = "UPDATE usuarios SET senha = '$nova_senha' WHERE id = " . $_SESSION['id'];
                    $sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL: " . $mysqli->error);
                    echo "<p>Senha alterada com sucesso!</p>";
                    break;
                } else {
                    echo "<p>Senha atual incorreta</p>";
                }
            }
        }
    }
}
?>