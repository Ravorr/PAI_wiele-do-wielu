<?php
include "polacz.php";
$pesel = wczytaj("pesel");
$imie = wczytaj("imie");
$nazwisko = wczytaj("nazwisko");
$data_ur = wczytaj("data_ur");

$sql = $baza->prepare("INSERT INTO wlasciciel VALUES (?, ?, ?, ?);");
if ($sql)
{
        $sql->bind_param("sssd", $pesel, $imie, $nazwisko, $data_ur);
        $sql->execute();
        $sql->close();
}
else
    die( 'Błąd: '. $baza->error);
$baza->close();
header ("Location: index.php");
?>
