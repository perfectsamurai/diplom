<?php
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

session_start();

if(isset($_GET['exit']))
{
	session_destroy();
	header('Location: index.php');
	exit;
}
	
	$host = 'localhost'; 
	$user = 'root'; 
	$password = 'root'; 
	$db_name = 'arhiv';
	
	$link = mysqli_connect($host, $user, $password, $db_name);
	mysqli_query($link, "SET NAMES 'utf8'");
?>




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Архив</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/inputmask.js"></script>

<script src="https://unpkg.com/imask"></script>
<script src="dist/jquery.inputmask.js"></script>
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Архив</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class=""><a href="index.php">Главная</a></li>

                <?php
				if (($_SESSION['role'])=='Пользователь'){
                    echo '
                            <li><a href="list3.php"> Мои документы</a></li>;

                ';
				}
                if (($_SESSION['role'])=='Администратор'){
                    echo '
                        <li><a href="list.php">Управление архивами</a></li>';
                    }
                if (($_SESSION['role'])=='Сотрудник'){
                        echo '
                            <li><a href="list2.php"> Мои документы</a></li>';
                        }
                    ?>
                    
            </ul>
				<?php
				if(!empty($_SESSION['auth'])){
				echo'
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">

				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><b>' .$_SESSION['name'].'</b> <span class="caret"></span></a>
                       <ul class="dropdown-menu">
                       <li><a href="list2.php">Мои документы</a></li>

                       <li role="separator" class="divider"></li>
                       <li><a href="?exit" >Выйти</a></li>
                       </ul>
                </li>';
				}else{
				echo '        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right"><li><a href="login.php">Войти</a></li>     <li><a href="register.php">Зарегистрироваться</a></li>';
				}
				?>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
