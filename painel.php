<?php
    session_start();
    include_once("conexao.php");

    if(!isset($_SESSION['login']) && $_SESSION['login'] == true) {
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="css/painel.css" rel="stylesheet">
</head>
<body>

<?php include("elementos/cabecalho-painel.php"); ?>


    <div class="cadastrar-noticia">
        <?php
            if(isset($_GET['id']) && !empty($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM noticias WHERE id='$id'";
            $res = mysqli_query($conn,$query);
            $dados = mysqli_fetch_assoc($res);
        ?>
        <h1 style="text-align:center; margin:10px;">Editar notícia</h1>
        <div class="linha"></div>

        <form action="funcoes.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="operacao" value="editarNoticia">
            <input type="hidden" name="idNoticia" value="<?php echo $dados['id']; ?>">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="<?php echo $dados['titulo']; ?>" style="width:300px">
            <br><br>
            <label for="subtitulo">Sutitulo:</label>
            <input type="text" name="subtitulo" value="<?php echo $dados['subtitulo']; ?>" style="width:300px">
            <br><br>
            <label for="descricao">Notícia:</label><br>
            <textarea name="descricao" id="descricao" cols="49" rows="10"><?php echo $dados['descricao']; ?></textarea><br><br>
            <label for="relacionados">Notícias relacionadas:</label><br>
                <input type="text" name="relacionados" value="<?php echo $dados['relacionados']; ?> " style="width:300px">
                <br>
            <br><br>
            <label for="foto">Imagem:</label>
            <input type="file" name="foto" id="foto" class="botoes">
            <br><br>
        
            <input type="submit" value="Editar noticia" class="botoes">
            <br>
            </form>
        <?php }else{ ?>
        
            <div>
                <h1 class="titulo" style="text-align:center;margin:10px;">Publique nova notícia</h1>

                <div class="linha"></div>
            </div>

            <form action="funcoes.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="operacao" value="cadastrarNoticia" >
                <label for="titulo">Título:</label><br>
                <input type="text" name="titulo" style="width:300px">
                <br><br>
                <label for="subtitulo">Sutitulo:</label><br>
                <input type="text" name="subtitulo" style="width:300px">
                <br><br>
                <label for="descricao">Notícia:</label><br>
                <textarea name="descricao" id="descricao" cols="39" rows="10"></textarea>
                <br><br>
                <label for="relacionados">Notícias relacionadas(opicional):</label><br>
                <input type="text" name="relacionados" style="width:300px">
                <br><br>
                <label for="foto">Imagem:</label>
                <input type="file" name="foto" id="foto" class="botoes">
                <br><br>
                <input type="submit" value="Cadastrar noticia" class="botoes">
                <br>
            </form>
        
        <?php } ?>
        
    </div>

 
        <div class="card-noticias">
            <h1 class="titulo-not">Notícias</h1>
        </div>
        <?php
            $query = "SELECT * FROM noticias";
            $res = mysqli_query($conn,$query);
        ?>
        
    <main>     
        <div class="painel">
            <?php while($dados = mysqli_fetch_assoc($res)){ /*retorna cada linha do resultado como um array associativo*/ ?> 
                <div class="noticias">
                    <a href="#" class="titulo-noticias">
                            <?php echo $dados['titulo']; ?>
                    </a>
                    <p class="subtitulo">
                        <?php echo $dados['subtitulo']; ?>
                    </p>
                    <div class="secao-foto">
                        <img src="<?php echo $dados['foto']; ?>" alt="Img não carregada" class="foto">
                    </div>
                    <div class="descricao-container">
                        <div class="descricao">
                            <?php echo $dados['descricao']; ?>
                        </div>
                    </div>
                    <div class="buton-opcoes">
                    <a href="painel.php?id=<?php echo $dados['id']; ?>">
                        <button type="button" class="botoes">Editar</button>
                    </a>
                    <form action="funcoes.php" method="post">
                        <input type="hidden" name="operacao" value="deletarNoticia">
                        <input type="hidden" name="idNoticia" value="<?php echo $dados['id']; ?>">
                        <input type="submit" value="Deletar" class="botoes">
                    </form>
                </div>
            </div>
            <?php  } ?>
        </div>

        <div class="relacionados">
        <?php
            $query = "SELECT * FROM noticias";
            $res = mysqli_query($conn,$query);
        ?>
            <h1>Relacionados</h1>
            <ul>
               <?php while($dados = mysqli_fetch_assoc($res)){  
                        if($dados['relacionados'] != ''){
                ?>
                
                <li><a href="#">
                    <?php echo $dados['relacionados']; ?>
                </a>
               <?php } 
               }
               ?>
            </ul>
        </div>
        
    </main>

    <footer>
        <div class="areas">
            <h3>Parcerias</h3>
            <ul>
                <li><a href="https://www.instagram.com/ifsertaope/">IFSertãoPE</a>
                <li><a href="https://www.instagram.com/ifsertaope.salgueiro/">IFSertão Campus Salgueiro</a>
                <li><a href="https://www.instagram.com/labmaker.salgueiro/">Lab Maker</a>
            </ul>
        </div>

        <div class="areas">
            <h3>Desenvolvido por</h3>
            <ul>
                <li><a href="https://www.instagram.com/emanoelferreira_lunguinho/">Emanoel fls</a>
                <li><a href="#">Kaik Bruno</a>
                <li><a href="#">Contate-nos</a>
            </ul>
        </div>
    </footer>

</body>
</html>
