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
            height: 50px;
        }

        a.cadastrar{
            color:rgb(52, 52, 52); 
            border-radius: 5px;
            font-size: 1.1em;
        }

        a.cadastrar:hover{
            color:rgb(127, 53, 156);
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
            
        <a href="cadastrar.php" class="cadastrar">Cadastre-se</a>
        <div class="sep"></div>
        <img src="img/logo.svg" alt="Logo"> 
        <div class="sep"></div>
        <div class="sair">
        </div>
    </header>

</body>
</html>