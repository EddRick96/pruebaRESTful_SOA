<?php

$url= "https://byrontosh.github.io/SOAJSON/personal.json";

//Toda la info que recoge la convierte a cadena
$miVar = file_get_contents($url);

//Decodificar para ser leido por PHP
$decodejson = json_decode($miVar);

echo "Informacion JSON desde url";
echo "<br>";

foreach ($decodejson as $p) {
  echo "Nombre: ".$nombre = $p->nombre; //alamacenos lo que leemos del JSON
  echo "<br>";
  echo "Departamento: ".$departamento = $p->depto;
  echo "<br>";
  echo "Cargo: ".$cargo = $p->cargo;
  echo "<br>";
  echo "Email: ".$email = $p->email;
  echo "<br>";
  echo "Genero: ".$genero = $p->genero;
  echo "<br>";
  echo "Telefono: ".$telefono = $p->telefono;
  echo "<br>";
  //Este es un objeto que contiene un arreglo:
  echo "Direccion: ";
  echo "<br>";
  $cont = "";
  foreach ($p->direccion as $d) {
    echo $d.".......";
    $cont=$cont." ".$d;
  }
    $con = mysqli_connect("mysql-uchih4jhonathan.alwaysdata.net", "211728", "Uchih4Jhonathan23") or die("Sin conexión");

    mysqli_set_charset($con, "utf8");
    mysqli_select_db($con, "uchih4jhonathan_empresa");

    $consulta = "INSERT INTO personal (nombre, departamento, cargo, email, genero, direccion, telefono) VALUES
                                      ('$nombre', '$departamento', '$cargo', '$email', '$genero', '$cont', '$telefono')";
    $resultado = mysqli_query($con, $consulta);
    echo "<br>";
}

if($resultado == true){
  echo "<br>";
  echo "Datos guardados!";
}else{
  echo "<br>";
  echo "Error";
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
  echo $dat->nombre;
  echo "<br>";
}
mysqli_close($con);

 ?>
