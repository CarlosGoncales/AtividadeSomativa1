<!DOCTYPE html>
<html>
    <?php
        require "includes/autentica.php";
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
                </div>    
              

            </div>    
        </div>  
               
    </body>
    <?php
        include "Includes/rodape.php" 
    ?>


<html>    
