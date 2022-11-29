<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Righteous&family=Roboto:wght@100&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../../public/styles/selecionarLivro.css">
    <link rel="icon" type="image/x-icon" href="../../public/images/icon-donut.png">
    <title>Emprestar - Donut Books</title>
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

        <div class="buttons">
            <a href="./cadastrarLivro.php" class="button">cadastrar</a>
            <a href="./selecionarLivro.php" class="button">emprestar</a>
            <a href="./devolver.php" class="button">devolver</a>
            <a href="./historico.php" class="button historico">histórico</a>
        </div>

        <div class="table">
            <table>
                <caption>emprestar livro</caption>
                <tr>
                    <th>livro</th>
                    <th>autor</th>
                    <th>proprietário</th>
                    <th>ação</th>
                </tr>
                
                <form action="" method="POST">

                    <?php include('../config/selecionarLivroFunction.php'); ?>

                </form>
            </table>
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