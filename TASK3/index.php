<?php
$price = array(200.5, 120.5, 500.99);
$price2 = array(200.99, 800.99, 250.00, 120.99);

echo getSum($price);
echo "<br>";
echo getSum($price2);

function getSum($arr)
{
    $count = 0;
    $sum = 0;
    foreach ($arr as $value) {
        if (preg_match_all("/\.99$/", $value, $match))
            $count++;
    }

    if ($count >= 3) {
        $sum = max($arr);
    } else {
        for ($i = 0; $i < count($arr); $i++) {
            $sum += $arr[$i];
        }
    }
    return $sum;
}
