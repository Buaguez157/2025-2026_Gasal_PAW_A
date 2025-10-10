<?php
$Lheight = array("Andy"=>"176", "Barry"=>"165", "Charlie"=>"170");
$new_Lheight=array("David"=>"180","Evan"=>"172","Frank"=>"168","George"=>"174","Harry"=>"169");
foreach ($new_Lheight as $i => $i_value) {
    $Lheight[$i]=$i_value;
}
foreach ($Lheight as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value . "<br>";
}
?>