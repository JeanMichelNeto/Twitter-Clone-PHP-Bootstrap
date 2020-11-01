<?php

class db{

    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = '';
    private $database = 'estudos';

    public function conecta_mysql(){

        $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

        //charset comunication 
        mysqli_set_charset($con, 'utf-8');

        //test connection
        if(mysqli_connect_errno()){
            echo 'Conect Fail!'.mysqli_connect_error();
        }

        return $con;
    }

}



?>