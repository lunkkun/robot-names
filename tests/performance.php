<?php

require __DIR__ . '/../vendor/autoload.php';

$alpha = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
$numeric = range(0, 9);

$characterSets = [
    $alpha,
    $alpha,
    $alpha,
    $numeric,
    $numeric,
];


// test

$start = microtime(true);

$generator = new \Lunkkun\RobotNames\Generator($characterSets);

$count = 0;
foreach ($generator as $string) {
    if ($count === 0) {
        $timeToFirst = microtime(true) - $start;
        echo "Time to first generated: $timeToFirst" . PHP_EOL;
    }
    if ($count < 5) {
        echo $string . PHP_EOL;
    }
    $count++;
}

$total = microtime(true) - $start;
echo "Time generating: $total" . PHP_EOL;
echo "Generated $count records" . PHP_EOL;
