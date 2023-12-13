<?php


    session_start(); /*inicia uma sessão*/
    include_once('conexao.php');
    
    /*IDENTIFICANDO A OPERAÇÃO PASSADA PELO INPUT DE NAME "operacao"  */
    $oper = '';
    if(isset($_POST['operacao']) && !empty($_POST['operacao'])){
        $oper = $_POST['operacao'];
    }

    switch ($oper){ 
        case 'cadastrarUsuario': cadastrarUsuario(); break;
        case 'login': login(); break;
        case 'cadastrarNoticia': cadastrarNoticia(); break;
        case 'deletarNoticia': deletarNoticia();break;
        case 'editarNoticia': editarNoticia();break;
    }


/* FUNÇÕES */
/*-----------------------------------------------------------*/
    function cadastrarUsuario(){

        global $conn; /* Faz referencia a variavel $conn que foi importada do arquivo conexao.php no inicio do código */

        if(isset($_POST['nome']) && 
            !empty($_POST['nome']) &&
            !empty($_POST['email']) &&
            !empty($_POST['senha'])){

            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $query = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
            

            $res = mysqli_query($conn, $query); /* executa a query no banco */

            if($res) /* $res identifica se a query foi executada com sucesso */
                header("Location: login.php");
            else
                header("Location: cadastrar.php?error=1");

        
        }else
            header("Location: cadastrar.php?error=2");
    }  

    function login(){
        global $conn;

        if(isset($_POST['email']) && 
            !empty($_POST['email']) &&
            !empty($_POST['senha'])){

            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $query = "SELECT * FROM usuario WHERE  email = '$email' AND senha = '$senha'";

         $res = mysqli_query($conn, $query);

            if($res->num_rows > 0){
                $_SESSION['login'] = true;
                header("Location: painel.php");}
            else
                header("Location: login.php?error=1");

        } else
            header("Location: login.php?error=2");
    }

    
    function cadastrarNoticia() {
        global $conn;

        if( isset($_POST['titulo']) &&
        !empty($_POST['titulo']) &&
        !empty($_POST['subtitulo']) &&
        !empty($_POST['descricao']) &&
        !empty($_FILES['foto'])) {  
        
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $descricao = $_POST['descricao'];

        /*Valor do noticias relacionados opcional */
        if(isset($_POST['relacionados']) && !empty($_POST['relacionados']) ){
            $relacionados = $_POST['relacionados'];
        }else{
            $relacionados = '';
        }

        // A PARTIR É ARQUIVO ....
        $upload = false; // Variável que indica se o upload foi bem-sucedido
        // Configurações de tamanho máximo e tipos de arquivo permitidos
        $tamanhoMaximo = 2 * 1024 * 1024; // 2MB em bytes
        $tiposPermitidos = array('jpg', 'jpeg', 'png', 'gif');  // Array de Tipos de arquivo permitidos
        
        // Obtém informações sobre o arquivo enviado
        $nomeArquivo = $_FILES['foto']['name']; // Nome original do arquivo
        $tamanhoArquivo = $_FILES['foto']['size']; // Tamanho do arquivo em bytes
        $extensaoArquivo = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION)); // Obtendo a extensão do arquivo em letras minúsculas
        
        // Verifica se o tamanho está dentro do limite
        if ($tamanhoArquivo <= $tamanhoMaximo) {

        // Verifica se a extensão é permitida
            if (in_array($extensaoArquivo, $tiposPermitidos)) {

            // Diretório de destino para salvar o arquivo
            $diretorioDestino = 'uploads/';
            
                // Move o arquivo para o diretório de destino
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $diretorioDestino . $nomeArquivo)) {
                    $upload = true;
                } else {
                    echo 'Erro ao mover o arquivo para o diretório de destino.';
                }
            } else {
                echo 'Apenas arquivos JPG, JPEG e PNG são permitidos.';
            }
        } else {
            echo 'O tamanho do arquivo é muito grande. O tamanho máximo permitido é de 2MB.';
        }
        
        
        //FIM DO ENVIO DO ARQUIVO
        
        
        if($upload) { /*verifica se upload pra pasta deu certo*/
            $query = "INSERT INTO noticias (titulo, subtitulo, descricao, relacionados, foto) VALUES ('$titulo', '$subtitulo', '$descricao', '$relacionados', '$diretorioDestino"."$nomeArquivo')";
            
            echo $query;
            $res = mysqli_query($conn, $query);
        }
        
        if($res)
            header("Location: painel.php");
        else
            header("Location: painel.php?error="+$query);   
        }
    }   


    function deletarNoticia(){
        global $conn;

        if(isset($_POST['idNoticia']) && 
        !empty($_POST['idNoticia'])){

        $idNoticia = $_POST['idNoticia'];

        $query = "DELETE FROM noticias WHERE id=$idNoticia";

       $res = mysqli_query($conn, $query);

       if($res)
        header("Location: painel.php");
        else
        header("Location: cadastrar.php");

    }}

    function editarNoticia(){

        global $conn;

        if(isset($_POST['titulo']) && 
        !empty($_POST['titulo']) &&
        !empty($_POST['subtitulo']) &&
        !empty($_POST['descricao']) &&
        !empty($_POST['idNoticia']) &&
        !empty($_FILES['foto'])) {

        $id = $_POST['idNoticia'];
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $descricao = $_POST['descricao'];

        if(isset($_POST['relacionados']) && !empty($_POST['relacionados']) ){
            $relacionados = $_POST['relacionados'];
        }else{
            $relacionados = '';
        }

        //VERIFICAR A NOVA FOTO
        // A PARTIR É ARQUIVO ....
        $upload = false; // Variável que indica se o upload foi bem-sucedido
        // Configurações de tamanho máximo e tipos de arquivo permitidos
        $tamanhoMaximo = 2 * 1024 * 1024; // 2MB em bytes
        $tiposPermitidos = array('jpg', 'jpeg', 'png', 'gif');  // Tipos de arquivo permitidos
        
        // Obtém informações sobre o arquivo enviado
        $nomeArquivo = $_FILES['foto']['name']; // Nome original do arquivo
        $tamanhoArquivo = $_FILES['foto']['size']; // Tamanho do arquivo em bytes
        $extensaoArquivo = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION)); // Obtendo a extensão do arquivo em letras minúsculas
        
        // Verifica se o tamanho está dentro do limite
        if ($tamanhoArquivo <= $tamanhoMaximo) {

        // Verifica se a extensão é permitida
            if (in_array($extensaoArquivo, $tiposPermitidos)) {

            // Diretório de destino para salvar o arquivo
            $diretorioDestino = 'uploads/';
            
                // Move o arquivo para o diretório de destino
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $diretorioDestino . $nomeArquivo)) {
                    $upload = true;
                } else {
                    echo 'Erro ao mover o arquivo para o diretório de destino.';
                }
            } else {
                echo 'Apenas arquivos JPG, JPEG e PNG são permitidos.';
            }
        } else {
            echo 'O tamanho do arquivo é muito grande. O tamanho máximo permitido é de 2MB.';
        }

        //FIM DO REENVIO DO ARQUIVO


        if($upload) {
            $query = "UPDATE noticias SET titulo='$titulo',subtitulo='$subtitulo', descricao='$descricao', relacionados='$relacionados', foto='$diretorioDestino"."$nomeArquivo' WHERE id='$id'";
            
            echo $query;
            $res = mysqli_query($conn, $query);
        }

       if($res)
        header("Location: painel.php");
        else
        header("Location: cadastrar.php");
    }}
    

?>