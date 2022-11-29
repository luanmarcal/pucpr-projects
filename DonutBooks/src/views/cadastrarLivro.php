<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Righteous&family=Roboto:wght@100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../public/styles/cadastrarLivro.css">
    <link rel="icon" type="image/x-icon" href="../../public/images/icon-donut.png">
    <title>Cadastrar - Donut Books</title>
</head>

<body>
    <main class="conteudo">
        <header class="menu" id="cabecalho">
            <nav>
                <span class="logo">
                    <a href="./home.php"><img src="../../public/images/logo-white-lowercase.png"></a>
                </span>
                <ul class="nav-list">
                    <div class="user">
                        <?php include('../config/showUserHeader.php'); ?>
                        <li class="sair"><a href="../config/logout.php">sair</a></li>
                    </div>
                </ul>
                <div class="mobile-menu">
                    <div class="line1"></div>
                    <div class="line2"></div>
                    <div class="line3"></div>
                </div>
            </nav>
        </header>

        <div class="card-login">
            <div class="card">
                <div class="card-header">
                    <p>cadastre seu livro</p>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="input-group">
                            <input class="input" placeholder="nome" name="nome">
                        </div>
                        <div class="input-group">
                            <input class="input" placeholder="autor" name="autor">
                        </div>

                        <?php include('../config/cadastrarLivroFunction.php'); ?>

                        <div class="input-group">
                            <button class="button" type="submit" name="btnEnviar">enviar</button>
                        </div>
                        <div class="input-group">
                            <a href="./home.php" class="button" type="submit">voltar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </main>

    <footer>
        <div class="rodape">
            <img src="../../public/images/logo-purple-lowercase.png">
            <p>&copy; 2022</p>
        </div>
    </footer>

</body>

</html>