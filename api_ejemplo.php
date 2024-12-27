<?php

$array = base64_decode($_GET['data']);
//$array = base64_decode($_POST['datos']);
$array = unserialize($array);
//$array = json_decode($_POST['datos']);

$nuevo_array = array();
$suma = 0;

foreach ($array as $key) {
    $suma += $key['stock'];
}


/*array_walk_recursive($array,function(&$item,$key){
    if(!mb_detect_encoding($item,'utf-8', true)){
        $item = utf8_decode($item);
    }
});*/
//print_r($array);
echo('<pre>');
print_r($array);
echo('</pre>');
//echo $suma;
//echo 'ssffss';


?>