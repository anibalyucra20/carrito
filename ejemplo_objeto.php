

    <?php
    require_once('include/conexion.php');

    $lista = array('alfredo', 'yul', 'eliana', 'william', 'steward');
    $contar = count($lista);
    print_r($lista);

    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    array_push($lista, "anibal");
    print_r($lista);
    /*
$contar = count($lista);
for ($i=0; $i <= $contar; $i++) { 
    echo $lista[$i]."<br>";
}
*/
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";

    $lista2 = array(1 => "yut", 4 => "laptop hp");
    echo $lista2[4];

    print_r($lista2);
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";




    $lista3 = array();

    $consulta = "SELECT * FROM producto";
    $ejecutar = mysqli_query($conexion, $consulta);
    while ($r_ejecutar = mysqli_fetch_array($ejecutar)) {
        $lista3[$r_ejecutar['id']] = $r_ejecutar['descripcion'];
    }

    print_r($lista3);

    echo $_SERVER['HTTP_HOST'];
    echo "<br>";
    echo "<br>";
    echo "<br>";

    $consulta = "SELECT * FROM producto";
    $ejecutar = mysqli_query($conexion, $consulta);
    $lista = array();
    /*while ($respuesta = mysqli_fetch_array($ejecutar)) {
    $lista[] = $respuesta['stock'];
}*/

    foreach ($ejecutar as $key) {
        $lista[] = $key;
    }
    //$lista = array(5,7,8);
    //$lista = json_encode($lista);
    //echo('<pre>');
    //var_dump($lista);
    //echo('</pre>');
    //print_r($lista);
    $lista = serialize($lista);
    $lista = base64_encode($lista);
    $lista = urlencode($lista);

    $res = array();
    //$res = file_get_contents("http://localhost:8888/carrito/api_ejemplo.php?data='" . $lista . "'");
    //$res = file_get_contents("https://apisigi.iestphuanta.edu.pe/admin.php?data='".$lista."'");
    //echo $res;
    //echo $lista;
    //echo('<pre>');
    //var_dump($res);
    //echo('</pre>');
    //print_r($res);

    $postdata = http_build_query(
        array(
            'datos' => $lista
        )
    );
    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-Type: application/x-www-form-urlencoded',
            'content' => $postdata
        )
    );
    $context  = stream_context_create($opts);
    $result = file_get_contents('https://apisigi.iestphuanta.edu.pe/admin.php', false, $context);
    echo $result;
    echo '<br>';
    echo $lista;
    echo '<br>ss';


    ?>
