<?php
$arr = array("A", "B", "C");

// 1. array_push()
array_push($arr, "D", "E");

// 2. array_merge()
$merged = array_merge($arr, array("F", "G"));

// 3. array_values()
$values = array_values($merged);

// 4. array_search()
$search = array_search("C", $merged);

// 5. array_filter()
$filtered = array_filter($merged, fn($v) => $v > "B");

// 6. Sorting
sort($merged); // ascending
rsort($merged); // descending

print_r($merged);
?>
