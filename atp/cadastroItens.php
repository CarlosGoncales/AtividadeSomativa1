<?php
    require "Includes/autentica.php" ;
    include "Includes/conectabanco.php" ;
    include "Includes/cabecalho.php" ;
    $id          = "";
    $Descricao   = "";
    $Observacao  = "";
    $Status      = "Disponivel";
    $idUsuario   = $_SESSION['id'] ;
    $Ativo       ="";

    if (isset($_GET['id'])){
        $sql = "SELECT * FROM itens where id=".$_GET['id'];
        $res = mysqli_query($conn, $sql) ;   
        $row = mysqli_fetch_assoc($res); 

        $id         = $row['ID'];
        $Descricao  = $row['DESCRICAO'];
        $Observacao = $row['OBSERVACAO'];
        $Status     = $row['STATUS'];
        $idUsuario  = $row['ID_USUARIO_DONO'];
        $Ativo      =$row['ATIVO'];

    }  
?>
 

<!DOCTYPE html >
<html>    
    <body>
        
        <div class="geral" >    
            <div class="row">   
                <div class="col-lg-5 banner border  border-end border-5 border-light" >
                        <img  src="Images/icone_banner.png" class="rounded-circle" width=40%>
                        <?php
                            include "Includes/banner.php" 
                        ?>
                         <a href='listaItens.php'> 
                            <button type="button" class="btn btn-dark btn-lg btn-banner"> Voltar a Lista de Itens </button>
                        </a>
                </div>      
                
                <div class="col-lg-7 divCadastros border border-5 border-light">
                   <center> <h2> Cadastro de Itens</h2></center> 
                   <form action="recebeCadastroItens.php" method="POST">                       
                        <input  type="hidden" name='id'value="<?php echo $id;?>"">
                        <h4>Descrição</h4> <input required type="text" name='Descricao'value="<?php echo $Descricao;?>">
                        <br>
                        <h4>Situação</h4>
                        <select required name="Ativo">
                            <option <?php if($Ativo == 'A'){echo ' selected ';};?>>Ativo</option>
                            <option <?php if($Ativo == 'I'){echo ' selected ';};?>>Inativo</option>

                        </select>  
                        <h4>Observação</h4><textarea name="Observacao"><?php echo $Observacao;?></textarea>
                        <input  type="hidden" name='Status'value="<?php echo $Status;?>">
                        <input  type="hidden" name='Usuario'value="<?php echo $idUsuario;?>">
                      
                        <br/><br/>
                        <input  type="submit" class="btn btn-success" value="Gravar Dados">
                   </form>    
                </div>    
              

            </div>    
        </div>  
               
    </body>
    <?php
        include "Includes/rodape.php" 
    ?>


<html>    


