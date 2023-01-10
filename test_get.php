<?php

echo urldecode(http_build_query($_GET));
echo '<hr>';
print_r($_GET);

$b = $_GET['tag'];
$b = array_diff( $_GET['tag'],array('c'));

print_r($b);



echo '<hr>';

// $a = $_GET['tag'];
// $a = array_diff( $_GET,$_GET['tag']);
$a = $_GET;
unset($a['tag']);

print_r($a);

echo '<hr>';

array_push($a, $b);
print_r($a);


echo '<hr>';

$arr = array('a','b','c');
print_r($arr);
        $arr = array_diff($arr, array('c'));

        print_r($arr);
?>