<?php
    include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="css/login-cadastro.css" media="screen"  />
</head>
<body>
    <?php include("elementos/cabecalho-login.php") ?>

    <div class="form">
        <form action="funcoes.php" method="POST">
            <h1 style="text-align:center;">Faça seu login</h1>

            <input type="hidden" name="operacao" value="login">
            <label for="email">E-mail:</label><br>
            <input type="email"  name="email">
            <br><br>
            <label for="senha">Senha:</label><br>
            <input type="password"  name="senha">
            <br><br>
            <input type="submit" value="Entrar">
            <br><br>
            <?php            
                if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
                    <p class="error">Email e/ou senha errados.Tente novamente</p>
                <?php } else if(isset($_GET['error']) && $_GET['error'] == 2 ) { ?>
                    <p class="error">Os campos não podem estar vazios</p>
                <?php }  ?>
        </form>
    </div>
</body>
</html>