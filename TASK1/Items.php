<?php
class Items
{

    public function getDifferenсe($obj, $count)
    {
        $sum = 0;
        foreach ($obj as $value) {
            $sum += $value;
        }
        $difference = $sum - $count;
        return $difference;
    }
}
