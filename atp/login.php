<?php
    include "Includes/conectabanco.php" ;

   $login= $_POST["Usuario"];
   $senha= $_POST["Senha"];

   $sql= "SELECT * FROM USUARIO WHERE LOGIN='$login' AND SENHA='$senha'";

   echo $sql;
   $res =mysqli_query($conn, $sql) ;    


   $qtdRegistro = mysqli_num_rows($res);
   if($qtdRegistro > 0){
      session_start();

      $row = mysqli_fetch_assoc($res);
      $_SESSION['id']  = $row['ID'];
      header("Location:inicio.php");   

   }
   else{
      header("Location:index.php?erro=1") ;   
   }



?>