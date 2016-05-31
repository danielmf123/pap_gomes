<?php

//Incluir ligação ao servidor//
include('../stuff/config.php');

//Ler o nome do produto//
$Produto = $_POST['produto'];

//Eliminar o produto selecionado//
$Eliminar_Produto = $con->prepare("DELETE FROM Produto WHERE Produto = ?");
$Eliminar_Produto->execute(array($Produto));

//Redirecionar para a pagina principal//
Header('Location: adicionarprod.php');

?>