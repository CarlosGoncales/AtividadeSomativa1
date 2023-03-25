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
                        <a href='cadastroUsuarios.php'>
                            <button type="button" class="btn btn-dark btn-lg btn-banner"> Cadastrar Usuarios </button>
                        </a>
                </div >      
               
                <div class="col-lg-7 divCadastros border border-5 border-light">
                   <center> <h1> Usuarios Cadastrados no Sistema.</h1></center> 
                   <table class="table table-hover table-bordered table-light">
                       
                            <tr class="table-secondary">
                                <td>#</td>
                                <td>Nome</td>
                                <td>Telefone</td>
                                <td>Email</td>
                                <td>-</td>
                            </tr>
                        
                        <?php
                            include "Includes/conectabanco.php" ;
                            $sql = "SELECT ID, NOME, TELEFONE, EMAIL FROM usuario";
                            $res =mysqli_query($conn, $sql) ;   
                        

                            while($row = mysqli_fetch_assoc($res)){
                                if($_SESSION['id']==$row['ID']){
                                    $Editar = "<td><a href='cadastroUsuarios.php?id=".$row['ID']."'>Editar</a></td>";
                                }
                                else{
                                    $Editar=""; 
                                }
                                  echo" <tbody >
                                     <tr>
                                        <td>".$row['ID']."</td>
                                        <td>".$row['NOME']."</td>
                                        <td>".$row['TELEFONE']."</td>
                                        <td>".$row['EMAIL']."</td>".$Editar."
                                        
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
