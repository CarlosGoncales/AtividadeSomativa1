<?php

    include "Includes/conectabanco.php" ;
    $id       ="";
    $nome     ="";
    $login    ="";
    $Endereco ="";
    $Email    ="";
    $Telefone ="";
    $Senha    ="";
    if (isset($_GET['id'])){
        $sql = "SELECT * FROM usuario where id=".$_GET['id'];
        $res =mysqli_query($conn, $sql) ;   
        $row = mysqli_fetch_assoc($res); 

        $id       = $row['ID'];
        $nome     = $row['NOME'];
        $login    = $row['LOGIN'];
        $Endereco = $row['ENDERECO'];
        $Email    = $row['EMAIL'];
        $Telefone = $row['TELEFONE'];
        $Senha    = $row['SENHA'];
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
                            <button type="button" class="btn btn-dark btn-lg btn-banner"> Voltar a Lista de Usuarios </button>
                        </a>
                </div >      
                
                <div class="col-lg-7 divCadastros border border-5 border-light">
                   <center>  <h1> Cadastro de Usuários</h1> </center> 
                    <form action="recebeCadastroUsuarios.php" method="POST">
                       <input type="hidden" name="id" value="<?php echo $id;?>">
                        <h4>Nome</h4><input  required type="text" name="Nome" value="<?php echo $nome;?>">
                        <br>
                        <h4>Login</h4><input required type="text" name="Login"value="<?php echo $login;?>">
                        <br>
                        <h4>Endereço</h4><input required type="text" name="Endereco"value="<?php echo $Endereco;?>">
                        <br>
                        <h4>Telefone</h4><input required type="text" name="Telefone"value="<?php echo $Telefone;?>">
                        <br>
                        <h4>Email</h4><input  required type="text" name="Email"value="<?php echo $Email;?>">
                        <h4>Senha</h4> <input required type="password"  name="Senha"value="<?php echo $Senha;?>">
                        <br>
                        <br>
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

