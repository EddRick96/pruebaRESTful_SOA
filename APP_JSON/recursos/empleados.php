<?php
$url= "https://byrontosh.github.io/SOAJSON/personal.json";

//Toda la info que recoge la convierte a cadena
$miVar = file_get_contents($url);

//Decodificar para ser leido por PHP
$decodejson = json_decode($miVar);

$cont = " ";
foreach ($decodejson as $p) {

    $con = mysqli_connect("mysql-uchih4jhonathan.alwaysdata.net", "211728", "Uchih4Jhonathan23") or die("Sin conexión");
    mysqli_set_charset($con, "utf8");
    mysqli_select_db($con, "uchih4jhonathan_empresa");

    foreach ($p->direccion as $d) {
      $cont=$cont." ".$d;
    }
}

//Leer datos desde Mysq
echo "<br>";
echo "Datos desde MySql";
$sql = "select * from personal";
$rs = mysqli_query($con, $sql);

while ($row1 = mysqli_fetch_object($rs)){
  $datos[] = $row1;
}

foreach ($datos as $dat) {
  echo "<br>";
  echo "Nombre: ".$nombre = $dat->nombre; //alamacenos lo que leemos del JSON
  echo "<br>";
  echo "Departamento: ".$departamento = $dat->depto;
  echo "<br>";
  echo "Cargo: ".$cargo = $dat->cargo;
  echo "<br>";
  echo "Email: ".$email = $dat->email;
  echo "<br>";
  echo "Genero: ".$genero = $dat->genero;
  echo "<br>";
  echo "Telefono: ".$telefono = $dat->telefono;
  echo "<br>";
  //Este es un objeto que contiene un arreglo:
  echo "Direccion: ".$cont;
  echo "<br>";
}
mysqli_close($con);

 ?>
