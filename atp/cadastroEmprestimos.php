<?php
    require "Includes/autentica.php" ;
    include "Includes/conectabanco.php" ;
    
    $ID          		="";
    $ID_ITEM            ="";
    $DT_EMPRESTIMO      ="";
    $DIAS_EMPRESTIMO    ="";
    $DT_DEVOLUCAO 		="";
    $OBSERVACAO    		="";
    
    if (isset($_GET['id'])){
        $sql = "SELECT * FROM emprestimos where id=".$_GET['id'];
        $res =mysqli_query($conn, $sql) ;   
        $row = mysqli_fetch_assoc($res); 

        $ID                 = $row['ID'];
        $ID_ITEM            = $row['ID_ITEM'];
        $DT_EMPRESTIMO      = $row['DT_EMPRESTIMO'];
        $DIAS_EMPRESTIMO    = $row['DIAS_EMPRESTIMO'];
        $DT_DEVOLUCAO       = $row['DT_DEVOLUCAO'];
        $OBSERVACAO         = $row['OBSERVACAO'];
        
    }  
?>
 

<!DOCTYPE html>
<html>
    <?php
        include "Includes/cabecalho.php" 
    ?>
    <body>
        
        <div class="geral" >    
            <div class="row">   
                <div class="col-lg-5 banner border  border-end border-5 border-light" >
                        <img  src="Images/icone_banner.png" class="rounded-circle" width=40%>
                        <?php
                            include "Includes/banner.php" 
                        ?>
                         <a href='listaUsuarios.php'> 
                            <button type="button" class="btn btn-dark btn-lg btn-banner"> Voltar a Lista de Usuários </button>
                        </a>
                </div >      
                
                <div class="col-lg-7 divCadastros border border-5 border-light">
                   <center>   <h1> Cadastro de Emprestimos</h1> </center> 
                    <form action="recebeCadastroEmprestimos.php" method="POST" >
                       <input type="hidden" name="id" value="<?php echo $ID;?>">
					   <input type="hidden" name="Usuario"value="<?php echo $_SESSION['id'];?>">
                        <h4>Item</h4>
                        <select required name="Item">
                            <option></option>
                            <?php
                                include "Includes/conectabanco.php" ;
                                $sql = "SELECT ID, DESCRICAO FROM ITENS where status='Disponivel'and ativo='A' and id_usuario_dono<>".$_SESSION['id'];
                                $res =mysqli_query($conn, $sql) ;   
                            
                                while($row = mysqli_fetch_assoc($res)){
                                    echo"  <option value='".$row['ID']."'> ".$row['ID']."-".$row['DESCRICAO']."</option>";
                                }

                            ?>
                        </select>    
                        <h4>Data Emprestimo</h4><input required type="date" name="DataEmp"value="<?php echo $DT_EMPRESTIMO;?>">
                        <br>
                        <h4>Dias de Emprestimo</h4><input  type="text" name="DiasEmprestimo"value="<?php echo $DIAS_EMPRESTIMO ;?>">
                        <br>
						<h4>Observação</h4><input  type="text" name="Obs"value="<?php echo  $OBSERVACAO ;?>">
						<br>
						<br>
                     
                        <input   type="submit" class="btn btn-success" value="Gravar Dados">
                    </form> 
                </div>    
              

            </div>    
        </div>  
               
    </body>
    <?php
        include "Includes/rodape.php" 
    ?>


<html>    

