<?php
    require_once('db.class.php');

 $usuario = $_POST['usuario'];
 $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND senha = '$senha' ";

    $ObjDB = new db();
    $link = $ObjDB->conecta_mysql();

   
    $result_id =  mysqli_query($link, $sql);


    if($result_id){
        $user_data = mysqli_fetch_array($result_id);
        if(isset($user_data['usuario'])){
            echo 'Usuário Existe!!';
        }else{
            header('Location: index.php?erro=1');
        }
    }else{
        echo 'erro';
    }
   


   




?>