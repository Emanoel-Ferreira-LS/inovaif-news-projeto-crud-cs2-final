<?php
    include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" type="text/css" href="css/login-cadastro.css" media="screen"  />
</head>
<body>
    <?php include("elementos/cabecalho-cadastrar.php") ?>

    <div class="form">
        <form action="funcoes.php" method="POST">
            <h1 style="text-align:center;">Faça seu cadastro</h1>
            <input type="hidden" name="operacao" value="cadastrarUsuario">
            <label for="nome">Nome:</label><br>
            <input type="text" name="nome">
            <br><br>
            <label for="email">E-mail:</label><br>
            <input type="email" name="email">
            <br><br>
            <label for="senha">Senha:</label><br>
            <input type="password" name="senha">
            <br><br>
            <input type="submit" value="Cadastrar">
            <br>       
            <?php            
                if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
                    <p class="error">Algo deu errado.Tente novamente</p>
                <?php } else if(isset($_GET['error']) && $_GET['error'] == 2 ) { ?>
                    <p class="error">Os campos não podem estar vazios</p>
                <?php }  ?>
        </form>
    </div>

</body>
</html>