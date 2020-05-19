<?php
include "polacz.php";
$vin = wczytaj("vin");
$marka = wczytaj("marka");
$model = wczytaj("model");
$rok = wczytaj("rok");

$sql = $baza->prepare("INSERT INTO samochod VALUES (?, ?, ?, ?);");
if ($sql)
{
        $sql->bind_param("sssi", $vin, $marka, $model, $rok);
        $sql->execute();
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();
header ("Location: index.php");
?>
