<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title></title>
</head>

<body>
  <h1 align="center">Servidores</h1>
  <?php
    // $iplist = ["192.168.100.205","192.168.11.1"];
    // Se enlistan las ip en una matriz, primera posición ip segunda el nombre del servidro
    $iplist = array(
      // array("192.168.11.1"," POS"),
      array("192.168.100.205"," Mi IP"),
      // array("192.168.11.23"," Comandero GB"),
      array("192.168.100.192"," Test")
    );
    // Count permite contar todos los elementos del arreglo en este caso la matriz
    $i = count($iplist);
    // For para rrecorrer la matriz
    for ($j=0; $j < $i ; $j++) {
      $ip = $iplist[$j][0];
      // Función exec permite ejecutar programas externos retorna $output como arreglo y estatus del comando ejecutado
      $ping = exec("ping -n 1 $ip" , $output, $status);
      // Condicionales para validar su fue exitoso o no el comando ejecutado retorna 0 su fue exitoso
      $results[] = $status;
    }
    // Tabla
    echo '<div class=container>';
    echo "<table class=table table-responsive>
      <thead>
        <tr>
          <th>IP<th/>
          <th>Servidor<th/>
          <th>Status<th/>
        <tr/>
      </thead>";
          foreach ($results as $item => $key) {
              echo '<tr>';
                echo '<td>'.$iplist[$item][0].'<td/>';
                echo '<td>'.$iplist[$item][1].'<td/>';
                if ($results[$item] == 0) {
                    echo '<td class="success">Ok<td/>';
                } else {
                    echo '<td class="danger"">Error<td/>';
                  }
               echo '<tr/>';
          }
    echo "<table/>";
    echo '<div/';
    ?>
</body>
</html>
