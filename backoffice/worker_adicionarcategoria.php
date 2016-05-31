<?php

//Incluir ligação ao servidor//
include("../stuff/config.php");

//Ler a categoria que o utilizador inseriu//
$Categoria = $_POST['categoria'];

//Verificar se a categoria não consta na BD//
$Verificar_Categoria = $con->prepare("SELECT * FROM Categoria WHERE Categoria = ?");
$Verificar_Categoria->execute(array($Categoria));

//Instanciar o contador//
$Count = 0;

//Enquanto existirem dados o sistema vai ler//
while($row = $Verificar_Categoria->fetch()){

    $Count++;

}

//Verificar se a variavel contadora possui valores superiores a 0//
if($Count==0){

    //Inserir a categoria na BD//
    $Inserir_Cat = $con->prepare("INSERT INTO Categoria(Categoria) VALUES (?)");
    $Inserir_Cat->execute(array($Categoria));

}

//Redirecionar para a pagina principal//
Header('Location: adicionarcategoria.php');


?>