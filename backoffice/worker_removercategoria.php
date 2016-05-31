<?php

//Incluir ligação ao servidor//
include('../stuff/config.php');

//Ler a categoria que o utilizador escolheu//
$Categoria = $_POST['categoria'];

//Remover a categoria que o utilizador introduziu//
$Remover_Categoria = $con->prepare("DELETE FROM Categoria WHERE Categoria = ?");
$Remover_Categoria->execute(array($Categoria));

//Redirecionar para a pagina principal//
Header('Location: adicionarcategoria.php');

?>