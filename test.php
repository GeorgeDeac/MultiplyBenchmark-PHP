<?php
include 'Karatsuba.php';
include 'Ethiopian.php';
include 'Lattice.php';

$a1 = 1234512313614354355345345345353345353345337654444345241;
$a2 = 2345343223423653454353453453534543543435344999997688875;

//Normal php multiplication
$time_start = microtime(true);
$a = 0;
for ($i = 0; $i < 1000; $i++) {
	$a = $a1 * $a2;
}
echo $a . '<br/>';

$time_end = microtime(true);
echo 'php normal multiplication: ';
echo '<b>Total Execution Time:</b> ' . ($time_end - $time_start);

//Karatsuba OO
$time_start = microtime(true);
$b = 0;
for ($i = 0; $i < 1000; $i++) {
	$b = Karatsuba::multiply($a1, $a2);
}
echo $b . '<br/>';

$time_end = microtime(true);
echo 'karatsuba OO: ';
echo '<b>Total Execution Time:</b> ' . ($time_end - $time_start);

//Ethiopian func
$time_start = microtime(true);
$c = 0;
for ($i = 0; $i < 1000; $i++) {
	$c = ethiopicmult($a1, $a1);
}
echo $c . '<br/>';

$time_end = microtime(true);
echo 'ethiopian func: ';
echo '<b>Total Execution Time:</b> ' . ($time_end - $time_start);

//Ethiopian OO
$time_start = microtime(true);
$d = 0;
for ($i = 0; $i < 1000; $i++) {
	$d = ethiopian_multiply::init($a1, $a2);
}
echo $d . '<br/>';

$time_end = microtime(true);
echo 'Ethiopian OO: ';
echo '<b>Total Execution Time:</b> ' . ($time_end - $time_start);

//Lattice func
$time_start = microtime(true);
$e = 0;
for ($i = 0; $i < 1000; $i++) {
	$e = Lattice($a1, $a2);
}
echo $e . '<br/>';

$time_end = microtime(true);
echo 'Lattice func: ';
echo '<b>Total Execution Time:</b> ' . ($time_end - $time_start);
