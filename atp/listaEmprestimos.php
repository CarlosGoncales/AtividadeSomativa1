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
                   <center> <h1>Itens Emprestados </h1> </center>             
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
                                           CURRENT_DATE -ADDDATE(a.DT_EMPRESTIMO, INTERVAL a.DIAS_EMPRESTIMO DAY)  AS Atraso
                                      from emprestimo a
                                     inner join usuario b on a.ID_USUARIO = b.ID 
                                     inner join itens c on a.ID_ITEM = c.ID
                                     inner join usuario d on c.ID_USUARIO_DONO = d.ID ";                            
                                 
                            $res =mysqli_query($conn, $sql) ;                                                
                            while($row = mysqli_fetch_assoc($res)){                                           
                             
                                if($row['Atraso'] > 0){
                                    $Cor = " class='table-danger'"; 
                                }
                                else{
                                    $Cor =""; 
                                }
                                
                                echo" <tbody >
                                        <tr".$Cor.">
                                        <td>".$row['ID']."</td>
                                        <td>".$row['DESCRICAO']."</td>
                                        <td>".$row['DONO']."</td>
                                        <td>".$row['NOME']."</td>
                                        <td>".$row['DT_EMPRESTIMO']."</td>
                                        <td>".$row['DIAS_EMPRESTIMO']."</td>
                                        <td>".$row['DT_DEVOLUCAO']."</td>
                                        <td>".$row['OBSERVACAO']."</td>
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
