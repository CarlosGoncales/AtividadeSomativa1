<!DOCTYPE html>
<html>
    <?php
        require "Includes/autentica.php" ;
        include "Includes/cabecalho.php" ;
    ?>
    <body>
      
        <div class="geral" >    
            <div class="row">   
                <div class="col-lg-5 banner border  border-end border-5 border-light" >
                        <img  src="Images/icone_banner.png" class="rounded-circle" width=40%>
                        <?php
                            include "Includes/banner.php" 
                        ?>
                        <a href='cadastroItens.php'>
                            <button type="button" class="btn btn-dark btn-lg btn-banner"> Cadastrar Itens </button>
                        </a>
                </div >      
                
                <div class="col-lg-7 divCadastros border border-5 border-light">
                   <center> <h1> Itens Cadastrados no Sistema.</h1></center> 
                    <table class="table table-hover table-bordered table-light">
                        <tr>
                            <td>#</td>
                            <td>Descrição</td>
                            <td>Ativo/Inativo</td>
                            <td>Usuario Dono</td>
                            <td>Observação</td>
                            <td>Status</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <?php
                            include "Includes/conectabanco.php" ;
                            $sql = "SELECT a.*,
                                          b.NOME
                                     FROM itens a 
                                     inner join usuario b on a.id_usuario_dono = b.id";
                            $res =mysqli_query($conn, $sql) ;   

                            while($row = mysqli_fetch_assoc($res)){
                                if(($row['STATUS']=='Emprestado') ||($row['ID_USUARIO_DONO'] != $_SESSION['id'])) {
                                    $excluir ="";  
                                    $Editar  ="";
                                }
                                else{
                                    $Editar ="<td><a href='cadastroItens.php?id=".$row['ID']."'>Editar</a></td>";
                                    $sql = "SELECT a.id
                                              FROM emprestimo a 
                                            where a.id=".$row['ID'];
                                    
                                    $resEmprestimo =mysqli_query($conn, $sql) ; 
                                    $rowEmprestimo = mysqli_fetch_assoc($resEmprestimo);
                                    echo( $rowEmprestimo);
                                    if(isset($rowEmprestimo['id'])){
                                        $excluir ="";   
                                    }
                                    else{
                                        $excluir= "<td><a href='excluiItens.php?id=".$row['ID']."'>Excuir</a></td>"; 
                                    }                                                                      
                                }     
                                 echo"<tr>
                                        <td>".$row['ID']."</td>
                                        <td>".$row['DESCRICAO']."</td>
                                        <td>".$row['ATIVO']."</td>
                                        <td>".$row['NOME']."</td>
                                        <td>".$row['OBSERVACAO']."</td>
                                        <td>".$row['STATUS']."</td>".
                                         $Editar.$excluir."</tr>";

                            }
                        ?>
                    
                    </table>
                    <h7 class="titulo"> Não é possível Exluir Itens que possuem emprestimos Registrados ou Itens de outros Usuários.</h7>
                    <br>
                    <h7 class="titulo"> Não é possível Editar Itens que estão em emprestimo.</h7>
                </div>    
              

            </div>    
        </div>  
               
    </body>
    <?php
        include "Includes/rodape.php" 
    ?>


<html>    
