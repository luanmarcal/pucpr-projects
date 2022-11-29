<?php include('../config/verifyLogin.php'); ?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Righteous&family=Roboto:wght@100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../public/styles/login.css">
    <link rel="icon" type="image/x-icon" href="../../public/images/icon-donut.png">
    <title>Login - Donut Books</title>
</head>

<body>
    <main class="conteudo">
        <header class="menu" id="cabecalho">
            <nav>
                <span class="logo">
                    <a href="./login.php"><img src="../../public/images/logo-white-lowercase.png"></a>
                </span>
                <ul class="nav-list">
                </ul>
                <div class="mobile-menu">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
        </header>

        <div class="title-header">
            <p class="title">Empreste livros gratuitamente</p>
            <p class="subtitle">Entre e comece a ler agora mesmo!</p>
            <img src="../../public/images/book-icon.png" height="100px" alt="Donut Books">
        </div>

        <div class="card-login">
            <div class="card">
                <div class="card-header">
                    <p>Faça seu login</p>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="input-group">
                            <input class="input" type="email" name="email" id="email" placeholder="email" autocomplete="off">
                        </div>
                        <div class="input-group">
                            <input class="input" type="password" name="senha" id="senha" placeholder="senha">
                        </div>
                        <div class="input-group">
                            <button class="button" type="submit" name="btnEntrar">entrar</button>
                        </div>
                    </form>
                </div>
                <?php include('../config/loginFunction.php') ?>
                <div class="card-footer">
                    <p>ainda não tem uma conta? <a href="./register.php">cadastre-se</a></p>
                </div>
            </div>
        </div>

    </main>

    <footer>
        <div class="rodape">
            <img src="../../public/images/logo-white-lowercase.png">
            <p>&copy; 2022</p>
        </div>
    </footer>

</body>

</html>