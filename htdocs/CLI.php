<?php
$param = var_dump($argv);


$mask = "|%5.5s |%-30.30s | x |\n";
printf($mask, 'Num', 'Title');
printf($mask, '1', 'A value that fits the cell');
printf($mask, '2', 'A too long value the end of which will be cut off');
echo $param;
?>