<?php
   include "Includes/conectabanco.php" ;
   $sql = "DELETE FROM itens where id=".$_GET['id'];
   $res =mysqli_query($conn, $sql) ;  

   header("Location: listaItens.php");
        
?>