<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesel & VIN</title>
</head>
<body>
<form method="get" action="insert.php">
   <table border="0">
      <tr><td>Pesel</td><td><input name="pesel" ></td></tr>
      <tr><td>Imie</td><td><input name="imie"></td></tr>
      <tr><td>Nazwisko</td><td><input name="nazwisko"></td></tr>
      <tr><td>Data</td><td><input type="date" name="data_ur"></td></tr>
      <tr><td colspan="2"><input type="submit" value="wstaw"></td></tr>
   </table>
</form>
<br> 
<form method="get" action="insert1.php">
   <table border="0">
      <tr><td>VIN</td><td><input name="vin" ></td></tr>
      <tr><td>Marka</td><td><input name="marka"></td></tr>
      <tr><td>Model</td><td><input name="model"></td></tr>
      <tr><td>Rok</td><td><input  name="rok"></td></tr>
      <tr><td colspan="2"><input type="submit" value="wstaw"></td></tr>
   </table>
</form>
<br> 

<select>
    <?php
include "polacz.php";
if ($sql =  $baza->prepare("SELECT * FROM wlasciciel ORDER BY pesel"))
{
        $sql->execute();
        $sql->bind_result($pesel, $imie, $nazwisko, $data_ur);
        while ($sql->fetch())
        {
                echo "
               
                    <option>$pesel</option>
                
                ";
        }
        $sql->close();
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin: ". $baza->error );

 $baza->close();
?>
</select>

<select>
    <?php
include "polacz.php";
if ($sql =  $baza->prepare("SELECT * FROM samochod ORDER BY vin"))
{
        $sql->execute();
        $sql->bind_result($vin, $marka, $model, $rok);
        while ($sql->fetch())
        {
                echo "
               
                    <option>$vin</option>
                
                ";
        }
        $sql->close();
 }
else die( "Błąd w zapytaniu SQL! Sprawdź kod SQL w PhpMyAdmin: ". $baza->error );

 $baza->close();
?>
</select>
</body>
</html>
