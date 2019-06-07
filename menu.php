<html>
    <head>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Библиотека</title>
        <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
		<div id="bg">
			<div id="outer">
				<div id="header">
					<div id="logo">
						<h1>
							<a href="index.html">Библиотека</a>
						</h1>
					</div>
					<div id="nav">
						<ul>
							<li >
								<a href="#">Главная</a>
							</li>
							<li>
								<a href="Books.html">Книги</a>
							</li>
							<li>
								<a href="Contacts.html">Контакты</a>
							</li>
							<li class="first active">
								<a href="reg.html">Авторизация</a>
							</li>
						</ul>
						<br class="clear" />
					</div>
				</div>
				<div id="banner">
					<img src="images/11.jpg" width="1120" height="200" alt="" />
				</div>
				<div id="main">
					
					<div id="content">
						<div id="box1">
<?php
require_once("MysqliClass.php");
$myconnect = MysqliClass::createDB();



$log = $_REQUEST['username'];
$pas = $_REQUEST['password'];

$m = $myconnect -> inspect("*", "`User`", "`Login`", $log);

// var_dump($m);
// echo "<br><br>";
// echo $m[0]['Password'];
// echo "<br><br>";
// echo $pas;
// echo "<br><br>";

if (count($m) > 0){

	if ($m[0]['Password'] == $pas){
		echo "<h1 align=\"center\">Привет  ".$m[0]['Name']."  ".$m[0]['Sub_name']."</h1>";

		?>

		<h2>Возможные действия:	</h2>
		<form action="show.php" method='POST'>
		<input type='submit' value='Показать всех' />
		</form>
		<br>
		<form action="find_by_author.php" method='POST'>
		<input type='submit' value='Найти по логину' />
		</form>
		<br>					
					
		<form action="del_user.php" method='POST'>
		<input type='submit' value='Удалить пользователя' />
		</form>
		<br>					
		<form action="update_user.php" method='POST'>
		<input type='submit' value='Обновить информацию о пользователе' />
		</form>
		<?php

	}
	else{
		echo "<h3>Введен неверный пароль!!!</h3><br><br>";
		echo "Попробовать еще <a href=\"reg.html\">раз</a>";
	}

}
else{
	echo "<h1>Такой пользователь не найден(</h1><br><br>";
	echo " <a href=\"reg.html\">Зарегистрироваться</a>";
}
?>
							
							
						</div>
						
						<br class="clear" />
					</div>
					<br class="clear" />
				</div>
				<div id="footer">
					<div id="footerSidebar">
						<h3>
							Навигация по библиотеке
						</h3>
						<ul class="linkedList">
							<li class="first">
								<a href="Books.html">Книги</a>
							</li>
							<li>
								<a href="Contacts.html">Контакты</a>
							</li>
							<li class="last">
								<a href="reg.html">Авторизация</a>
							</li>
						</ul>
					</div>
					<div id="footerContent">
						
						<p>
							Наша библиотека в первую очередь является добровольным проектом, который призван помочь людям в поиске интересующих книг. Поэтому если есть возможность, а главное желание, то мы будем вовсе не против ваших пожертвований.
						</p>
					</div>
					<br class="clear" />
				</div>
			</div>
			
		</div>
    </body>
</html>
