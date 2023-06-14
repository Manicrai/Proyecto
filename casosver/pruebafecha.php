<?php
$fecha_actual = date ("d-m-y");
$fecha_vieja = date ("d-m-y",strtotime ($fecha_actual. '-1 week'));

echo $fecha_vieja;


?>