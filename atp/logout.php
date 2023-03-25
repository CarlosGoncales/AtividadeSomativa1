<?php

	session_start();
	
	//Apaga da memória os valores armazenados na sessão
	unset($_SESSION['id']);
	
	header("Location: index.php");