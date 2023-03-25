<?php
    $conn = mysqli_connect("localhost","root","","atp");

    if  ($conn == false){
         die("Erro ao conectar ao MySql. ".mysqli_connect_error()) ;
    }
?>