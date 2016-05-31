<?php

//Função para contar as entradas existentes//
function Contar_Valores($tabela){

    //Incluir ligação ao servidor//
    include('../stuff/config.php');

    //Preparar a query para o Sistema//
    $Contar_Entradas = $con->prepare("SELECT * FROM $tabela");
    $Contar_Entradas->execute();
    $Count = 0;

    while($Contar_Entradas->fetch()){

        $Count++;

    }

    return $Count;


}

//Função para introduzir uma nova visita ao sistema//
function Adicionar_Visita($ip){

    //Incluir ligação ao servidor//
    include('config.php');

    //Preparar a query para o Sistema//
    $Registar_Visita = $con->prepare("INSERT INTO Visitas(Localizacao) VALUES (?)");
    $Registar_Visita->execute(array($ip));

}

//Função para obter o IP do utilizador//
function get_IP(){

    return $_SERVER['REMOTE_ADDR'];

}

//Função para obter todas as categorias//
function get_Categorias(){

    //Incluir ligação ao servidor//
    include('../stuff/config.php');

    //Preparar a query ao servidor//
    $Ler_Categorias = $con->prepare("SELECT Categoria FROM Categoria");
    $Ler_Categorias->execute();

    //Instanciar contador//
    $total_Categorias = $Ler_Categorias->rowCount();

    //Caso existam categorias deve mostrar , caso não exista deve informar o utilizador//
    if($total_Categorias>0){

        //Ler os dados da BD//
        while($row = $Ler_Categorias->fetch()){

            //Executar o output da categoria para o SELECT no html//
            echo "<option value = '" . $row['Categoria'] . "'>" . $row['Categoria'] . "</option>";


        }

    }
    else{

        echo "<option>Não existem categorias</option>";

    }


}

//Função para ler ID's//
function ler_IDCat($select_what,$select_from,$select_where,$where_value){

    //Incluir ligação ao servidor//
    include('../stuff/config.php');

    $Ler_ID = $con->prepare("SELECT $select_what FROM $select_from WHERE $select_where = ?");
    $Ler_ID->execute(array($where_value));

    while($row = $Ler_ID->fetch()){

        return $ID = $row['ID'];

    }

}

//Função para obter todos os produtos para uma lista//
function get_Produtos(){


    //Incluir ligação ao servidor//
    include('../stuff/config.php');

    $Ler_Produtos = $con->prepare("SELECT Produto FROM Produto");
    $Ler_Produtos->execute();

    while($row = $Ler_Produtos->fetch()){

        //Executar o output da categoria para o SELECT no html//
        echo "<option value = '" . $row['Produto'] . "'>" . $row['Produto'] . "</option>";

    }

}

?>