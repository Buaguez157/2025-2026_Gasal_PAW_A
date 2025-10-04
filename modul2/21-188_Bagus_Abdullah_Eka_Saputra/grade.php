<form method="post">
    <input type="number" name="n">
    <input type="submit">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['n'])&& is_numeric($_POST['n'])){
    $n=$_POST['n'];

if($n<10){
    echo"C";
}elseif($n<20){
    echo"B";
}else{echo"A";}}
?>