<?php
    include "Includes/conectabanco.php" ;

    $ID                  = $_POST["id"];
    $ID_ITEM             = $_POST["Item"];
    $ID_USUARIO          = $_POST["Usuario"];
    $DT_EMPRESTIMO       =$_POST["DataEmp"];
    $DIAS_EMPRESTIMO     =$_POST["DiasEmprestimo"];
    $DT_DEVOLUCAO        =$_POST["DataDev"];
    $OBSERVACAO          =$_POST["Obs"];

    if (empty($id) ){
        $sql = "INSERT INTO EMPRESTIMO(ID_ITEM, ID_USUARIO, DT_EMPRESTIMO, DIAS_EMPRESTIMO,DT_DEVOLUCAO,OBSERVACAO)
                              VALUES('$ID_ITEM','$ID_USUARIO','$DT_EMPRESTIMO','$DIAS_EMPRESTIMO','$DT_DEVOLUCAO','$OBSERVACAO' ) ";
        $sql2 = "UPDATE ITENS SET STATUS='Emprestado' where id=".$ID_ITEM ;

        $res =mysqli_query($conn, $sql2) ;   
  }   
    else{
       $sql = "UPDATE EMPRESTIMO SET
                      ID_ITEM='$ID_ITEM',
                      ID_USUARIO='$ID_USUARIO',
                      DT_EMPRESTIMO='$DT_EMPRESTIMO',
                      DIAS_EMPRESTIMO='$DIAS_EMPRESTIMO',
                      DT_DEVOLUCAO='$DT_DEVOLUCAO',
                      OBSERVACAO='$OBSERVACAO'
                WHERE ID=$ID ";
    }
    $res =mysqli_query($conn, $sql) ;           

    header("Location: listaEmprestimos.php");
?>