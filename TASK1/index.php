<?php
include "Items.php";

$obj = new Items();
$obj->skate = 200;
$obj->painting = 200;
$obj->shoes = 1;
echo "Difference: " . $obj->getDifferenсe($obj, 400);
