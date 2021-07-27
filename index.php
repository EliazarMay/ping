<?php
// $iplist = ["192.168.100.205","192.168.11.1"];
// Se enlistan las ip en una matriz, primera posición ip segunda el nombre del servidro
$iplist = array(
  array("192.168.11.1"," POS"),
  array("192.168.100.205"," Mi Ip")
);
// Count permite contar todos los elementos del arreglo en este caso la matriz
$i = count($iplist);
// For para rrecorrer la matriz
for ($j=0; $j < $i ; $j++) {
  $ip = $iplist[$j][0];
  // Función exec permite ejecutar programas externos retorna $output como arreglo y estatus del comando ejecutado
  $ping = exec("ping -n 1 $ip" , $output, $status);
  // Condicionales para validar su fue exitoso o no el comando ejecutado retorna 0 su fue exitoso 
  if ($status == 0) {
    echo $iplist[$j][0]. $iplist[$j][1] . " Ok";
    echo '<br/>';
  }else {
    echo $iplist[$j][0]. $iplist[$j][1] . " Error";
    echo '<br/>';
  }
}

?>
