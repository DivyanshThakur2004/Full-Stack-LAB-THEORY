<?php
$arr = [10,20,30,40,50,60,70,80,90,100];
function avgmarks($arr){
    $sum = 0;
    foreach($arr as $variable){
        $sum += $variable;
    }
    $avg = $sum/count($arr);
    return $avg;
}
for($i = 0 ; $i < count($arr); $i++){
    echo "The " . $i+1 . " Number is " . $arr[$i] . "<br>";
}
echo "<br>";
$result = avgmarks($arr);
echo "The Average Marks is " . $result . "<br>";
?>