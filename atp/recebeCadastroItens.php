<?php
    include "Includes/conectabanco.php" ;

    $id              = $_POST["id"];
    $Descricao       = $_POST["Descricao"];
    $Observacao      = $_POST["Observacao"];
    $Status          =$_POST["Status"];
    $ID_USUARIO_DONO =$_POST["Usuario"];
    if($_POST["Ativo"] == 'Ativo'){
        $Ativo = 'A'; 
    }
    else{
        $Ativo = 'I';  
    }


    if (empty($id) ){
        $sql = "INSERT INTO ITENS(DESCRICAO, OBSERVACAO, STATUS, ID_USUARIO_DONO,ATIVO)
                              VALUES('$Descricao','$Observacao','$Status','$ID_USUARIO_DONO','$Ativo' ) ";
    }   
    else{
       $sql = "UPDATE ITENS SET
                      DESCRICAO='$Descricao',
                      OBSERVACAO='$Observacao',
                      STATUS='$Status',
                      ID_USUARIO_DONO ='$ID_USUARIO_DONO',
                      ATIVO ='$Ativo'
                WHERE ID=$id ";
    }
   echo($sql);
    $res =mysqli_query($conn, $sql) ;           

    header("Location: listaItens.php");
?>