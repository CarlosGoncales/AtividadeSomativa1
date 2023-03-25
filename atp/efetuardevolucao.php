<!DOCTYPE html>
<html>
    <?php
        require "Includes/autentica.php" ;
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
                        <a href='cadastroEmprestimos.php'>
                            <button type="button" class="btn btn-dark btn-lg btn-banner"> Cadastrar Emprestimos </button>
                        </a>
                </div >      
               
                <div class="col-lg-7 divCadastros border border-5 border-light">
                   <center> <h1>Efetar Devolução</h1></center>             
                   <table class="table table-hover table-bordered table-light">
                       
                            <tr class="table-secondary">
                                <td>#</td>
                                <td>Descrição</td>
                                <td>Usario Dono</td>
                                <td>Usario Emprestimo</td>
                                <td>Data de Emprestimo</td>
                                <td>Data Programada de Devolução</td>
                                <td>Data de Devolução</td>
                                <td>Observação</td>
                                <td>-</td>
                            </tr>
                        
                        <?php
                            include "Includes/conectabanco.php" ;
                            $sql = "select a.ID,
                                           c.DESCRICAO, 
                                           d.NOME as DONO,
                                           b.NOME,
                                           a.DT_EMPRESTIMO,
                                           a.DIAS_EMPRESTIMO,
                                           a.DT_DEVOLUCAO,
                                           a.OBSERVACAO,
                                           c.id as Item                                        
                                      from emprestimo a
                                     inner join usuario b on a.ID_USUARIO = b.ID 
                                     inner join itens c on a.ID_ITEM = c.ID
                                     inner join usuario d on c.ID_USUARIO_DONO = d.ID 
                                    WHERE a.ID_USUARIO=".$_SESSION['id']."
                                    and a.DT_DEVOLUCAO is null";
                            
                                  
                            $res =mysqli_query($conn, $sql) ;   
                        

                            while($row = mysqli_fetch_assoc($res)){
                                echo" <tbody >
                                     <tr>
                                        <td>".$row['ID']."</td>
                                        <td>".$row['DESCRICAO']."</td>
                                        <td>".$row['DONO']."</td>
                                        <td>".$row['NOME']."</td>
                                        <td>".$row['DT_EMPRESTIMO']."</td>
                                        <td>".$row['DIAS_EMPRESTIMO']."</td>
                                        <td>".$row['DT_DEVOLUCAO']."</td>
                                        <td>".$row['OBSERVACAO']."</td>
                                        <td><a href='devolucao.php?id=".$row['ID']."&idItem=".$row['Item']."'>Devolver</a></td>
                                       
                                      </tr>
                                      </tbody> ";

                            }
                        ?>
                    
                    </table>
                </div>    
              

            </div>    
        </div>  
               
    </body>
    <?php
        include "Includes/rodape.php" 
    ?>


<html>    
