<?php
require_once("MysqliClass.php");
$myconnect = MysqliClass::createDB();

$m = $myconnect -> gettable("`Author`, `Name`", "Book");
//echo $m[0]['Author'];

$name = $_REQUEST['my_author'];
echo $name;

?>