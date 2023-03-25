<?php
    include "Includes/conectabanco.php" ;
    $id       = $_POST["id"];
    $nome     = $_POST["Nome"];
    $login    = $_POST["Login"];
    $Endereco =$_POST["Endereco"];
    $Email    =$_POST["Email"];
    $Telefone =$_POST["Telefone"];
    $Senha    =$_POST["Senha"];
    if (empty($id) ){
        $sql = "INSERT INTO USUARIO(NOME, LOGIN, ENDERECO, EMAIL, TELEFONE, SENHA) 
                              VALUES('$nome','$login','$Endereco', '$Email','$Telefone','$Senha' ) ";
    }   
    else{
       $sql = "UPDATE USUARIO SET
                      NOME='$nome',
                      LOGIN='$login',
                      ENDERECO='$Endereco',
                      EMAIL='$Email',
                      TELEFONE='$Telefone',
                       SENHA='$Senha'
                WHERE ID=$id ";
    }
    $res =mysqli_query($conn, $sql) ;           
    header("Location: listaUsuarios.php");
?>