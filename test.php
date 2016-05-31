<?php
include_once 'stuff/config.php';
function Contar ($con,$tabela) {
    $sql = $con->prepare("SELECT COUNT(*) AS Contar FROM Utilizador;");
    $sql->execute();
    $row = $sql->fetchAll(PDO::FETCH_ASSOC);
    return $row[0]['Contar'];
}


echo "<pre>";
var_dump(Contar($con,"Utilizador"));
echo "</pre>";