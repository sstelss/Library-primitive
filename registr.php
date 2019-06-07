<?php
require_once("MysqliClass.php");
$myconnect = MysqliClass::createDB();


$log = $_REQUEST['login'];
$pas = $_REQUEST['password'];
$name = $_REQUEST['first_name'];
$subname = $_REQUEST['second_name'];
$year  = $_REQUEST['data'];
$mail = $_REQUEST['mail'];

$m = $myconnect -> inspect("*", "`User`", "`Login`", $log);

if (count($m) > 0){
	echo "<h1>Выбранный логин занят!!!! ВЫбирите другой логин.</h1>";
}
else{

	$d=array();
	$d['Login'] = $log;
	$d['Password'] = $pas;
	$d['Name']=$name;
	$d['Sub_name'] = $subname;
	$d['Date'] = $year;
	$d['Mail'] = $mail;

	$m = $myconnect -> insert_into_table("`User`", $d);

	echo "<h1>Пользователь".$name." ".$subname." успешно зарегистрирован</h1><br>";
	echo "<h3>Ваш логин:   </h3>".$log."<br>";
	echo "<h3>Ваш пароль:   </h3>".$pas."<br><br><br>";

	echo "Перейти к <a href=\"reg.html\">авторизации</a>";
}

?>