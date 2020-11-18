<?php
    include('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $ObjDB = new db();
    $link = $ObjDB->conecta_mysql();

    $usuario_existe = false;
    $email_existe = false;

    //Verificar se usuário já existe
    $sql = "select * from usuario where usuario = '$usuario'";
    if($resultado_id = mysqli_query($link, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado_id);
        
        if(isset($dados_usuario['usuario'])){
            $usuario_existe = true;
        }else{
            echo 'Usuário Não Cadastrado!';
        }

    }else{
        echo 'Erro!';   
    }

    //Verifica se o email já está em uso
    $sql = "select * from usuario where email = '$email'";
    if($resultado_id = mysqli_query($link, $sql)){
        $dados_usuario = mysqli_fetch_array($resultado_id);
        
        if(isset($dados_usuario['email'])){
           $email_existe = true;
        }

    }else{
        echo 'Erro!';   
    }

    if($usuario_existe || $email_existe){
        $retorno_get = '';

        if($usuario_existe){
            $retorno_get.= "erro_usuario=1&";
        }

        if($email_existe){
            $retorno_get.= "erro_email=1&";
        }

        header('Location: inscrevase.php?'.$retorno_get);
        die();
    }



    $sql = "insert into usuario (usuario, email, senha) VALUES ('$usuario', '$email', '$senha')";

    //query
    if(mysqli_query($link, $sql)){
        echo 'Query OK!';
    }else{
        echo 'Erro!';
    }






?>