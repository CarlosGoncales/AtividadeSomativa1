<!DOCTYPE html>
<html>
    <head>
         <title>Programa Emprestimo de Itens</title>
        <link rel="stylesheet" href="css/styles.css" >
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">  
        <script src="https://kit.fontawesome.com/5ca7f8ecf3.js" crossorigin="anonymous"></script>
    </head>
    <body background="Images/fundo_login.png">      
        <Center> 
            <form name="index"  method="post" action="login.php" >
                <div class="divLogin">                    
                    <div class="divCaixa">
                        <img  src="Images/cadeado.png" alt="Perfil"     width= 190px border-radius= 50px;>
                        <br>
                        <input name="Usuario" id ="Usuario" type="text" placeholder="Usuario">
                        <br>
                        <input name="Senha" id="Senha" type="password" placeholder="Senha">
                        <br>
                        <br>
                        <input  type="submit" class="btn btn-success" value="Fazer Login">
                        <br>

                        <a href="CadastroUsuarios.php">Cadastrar Conta</a>
                        <br>
                        <?php
                            if(isset($_GET['erro'])){
                                echo '<p style="text-align:center;color:red"> Usuário e/ou senha incoreto(s).</p>';
                            }
                        ?>

                    </div>  
                </div>  
            </form>   
        </Center> 
    </body>
</html>
