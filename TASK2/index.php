<?php
//include "action.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="action.php" method="POST">
        <h2>PRODUCT SIZE</h2>
        <label for="productWidth">Width</label>
        <input type="number" name="productWidth" required>
        <label for="productHeight">Height</label>
        <input type="number" name="productHeight" id="productHeight" required>
        <label for="productDepth">Depth</label>
        <input type="number" name="productDepth" id="productDepth" required>
        <br />
        <h2>DOOR SIZE</h2>
        <label for="doorWidth">Width</label>
        <input type="number" name="doorWidth" required>
        <label for="doorHeight">Height</label>
        <input type="number" name="doorHeight" id="doorHeight" required>
        <br />
        <button type="submit">Submit</button>
    </form>
</body>

</html>