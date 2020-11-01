<?php
    include('db.class.php');

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $ObjDB = new db();
    $link = $ObjDB->conecta_mysql();

    $sql = "insert into usuario (usuario, email, senha) VALUES ('$usuario', '$email', '$senha')";

    //query
    if(mysqli_query($link, $sql)){
        echo 'Query OK!';
    }else{
        echo 'Erro!';
    }






?>