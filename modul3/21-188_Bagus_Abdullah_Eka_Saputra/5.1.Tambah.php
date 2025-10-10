<?php
$Lstudents = array(
    array("Alex","220401","0812345678"),
    array("Bianca","220402","0812345687"),
    array("Candice","220403","0812345665"),
    array("Daniel","220404","0812345699"),
    array("Evelyn","220405","0812345600"),
    array("Felix","220406","0812345611"),
    array("Grace","220407","0812345622"),
    array("Hannah","220408","0812345633")
);
for ($row = 0; $row < 8; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
    echo "<li>".$Lstudents[$row][$col]."</li>";
    }
    echo "</ul>";
}
?>
<br><br>
<?php
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Name</th><th>NIM</th><th>Mobile</th></tr>";
foreach ($Lstudents as $student) {
    echo "<tr>";
    echo "<td>{$student[0]}</td>";
    echo "<td>{$student[1]}</td>";
    echo "<td>{$student[2]}</td>";
    echo "</tr>";
}
echo "</table>";
?>