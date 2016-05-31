<?php

//Incluir ligação ao servidor//
include('../stuff/config.php');

//Incluir ficheiro de funções//
include('../stuff/funcs.php');

//Ler os dados do formulário//
$Produto = $_POST['produto'];
$Descricao = $_POST['descricao'];
$Preco = $_POST['preco'];
$Quantidade = $_POST['quantidade'];
$Categoria = $_POST['categoria'];
$URL_Imagem = $_POST['imagem'];

//Ler o ID da categoria//
//$ID_Categoria = ler_IDCat("ID","Categoria","Categoria",$Categoria);
$ID_Categoria = ler_IDCat("ID","Categoria","Categoria",$Categoria);

//Introduzdir produto na BD//
$Inserir_Produto = $con->prepare("INSERT INTO Produto(Produto,Descricao,Preco,Quantidade,Categoria_ID,Imagem) VALUES(?,?,?,?,?,?)");
$Inserir_Produto->execute(array($Produto,$Descricao,$Preco,$Quantidade,$ID_Categoria,$URL_Imagem));

//Redirecionar para a pagina principal//
Header('Location: adicionarprod.php');

?>