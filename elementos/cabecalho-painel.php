<!DOCTYPE html>
<head>
    <style>
        header{
            width: 80%;
            padding: 10px;
            display: flex;
            justify-content: space-around;
            background-color:rgba(209, 204, 204, 0.41);
            margin: auto;
            margin: 30px auto;
            border-radius: 20px;
            align-items: center;
            height: 60px;
        }

        a.cadastrar, a.login{
            color:rgb(52, 52, 52);
            padding: 5px;   
            border-radius: 5px;
            font-size: 1.1em;
        }

        a.cadastrar,a.login:hover{
            color: rgb(36, 36, 36);
        }

        img{
            margin-top: 20px;
            width: 170px;
            padding: 10px;
            border-radius: 10px;

        }
        .sep{
            width: 1px;
            height: 35px;
            background-color: black;
        }

        .sair-p{
            padding: 8px;
            color: rgb(52, 52, 52);
            font-size: 1em;
        }

        .sair{
            width: 50px;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .sair-botao{
            width: 30px;
            height: 30px;
            margin: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="sair"></div>
        <a href="login.php" class="login">Login</a>
        <div class="sep"></div>
        <img src="img/logo.svg" alt="Logo"> 
        <div class="sep"></div>
        <a href="cadastrar.php" class="cadastrar">Cadastre-se</a>
        <a href="logout.php">  
            <div class="sair">     
                <p class="sair-p">Sair</p>
                <img src="img/sair2.png" class="sair-botao">
            </div>
        </a>
       

    </header>

</body>
</html>