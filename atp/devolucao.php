<?php
    include "Includes/conectabanco.php" ;

    $ID                  = $_GET["id"];
    $ID_ITEM             = $_GET["idItem"];

     
        $sql = "UPDATE ITENS SET STATUS='Disponivel' WHERE ID=$ID_ITEM";
        $sql2 = "UPDATE Emprestimo a SET a.DT_DEVOLUCAO=CURRENT_DATE  WHERE ID=$ID ";
        $res =mysqli_query($conn, $sql) ;   
        $res2 =mysqli_query($conn, $sql2) ;   
   
    
    if($res){
      header("Location: efetuardevolucao.php");
    }
    else{
      echo "Erro";
    }


?>