<?php
if (isset($_POST) && $_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['doorWidth'] >= $_POST['productWidth'] && $_POST['doorHeight'] >= $_POST['productHeight']) {
        echo "The product pass through the door";
    } else if ($_POST['doorWidth'] >= $_POST["productHeight"] && $_POST['doorHeight'] >= $_POST['productWidth']) {
        echo "The product pass through the door";
    } else if ($_POST['doorHeight'] >= $_POST['productDepth'] && $_POST['doorWidth'] >= $_POST["productHeight"]) {
        echo "The product pass through the door";
    } else if ($_POST['doorHeight'] >= $_POST['productWidth'] && $_POST['doorWidth'] >= $_POST['productDepth']) {
        echo "The product pass through the door";
    } else if ($_POST['doorHeight'] >= $_POST['productHeight'] && $_POST['doorWidth'] >= $_POST['productDepth']) {
        echo "The product pass through the door";
    } else if ($_POST['doorWidth'] >= $_POST['productWidth'] && $_POST['doorHeight'] >= $_POST['productDepth']) {
        echo "The product pass through the door";
    } else {
        echo "The product does not pass through the door";
    }
}
