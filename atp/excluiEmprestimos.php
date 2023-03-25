<?php
   include "Includes/conectabanco.php" ;
   $sql = "DELETE FROM EMPRESTIMO where id=".$_GET['id'];
   $res =mysqli_query($conn, $sql) ;  
   
   header("Location: listaEmprestimos.php");   
?>