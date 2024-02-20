<?php require_once('header.php');

if(!empty($_POST['name']) and !empty($_POST['email']) and !empty($_POST['password']) and !empty($_POST['password2'])){

$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);
$phone = strip_tags($_POST['phone']);
$password= strip_tags($_POST['password']);
$password2= strip_tags($_POST['password2']);

$i=0;

if(preg_match("/^[a-zA-Za-яёА-ЯЁ\s\-]+$/u", $name)) {
	$i++;
}else{$prover='<div class="valid">Некорректное ФИО</div>';}

if(preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email)){
	$i++;
}else{$prover2='<div class="valid">Некорректная почта</div>';}
	
if(preg_match("/(8|7|\+7){0,1}[- \\\\(]{0,}([9][0-9]{2})[- \\\\)]{0,}(([0-9]{2}[- ]{0,}'.
'[0-9]{2}[- ]{0,}[0-9]{3})|([0-9]{3}[- ]{0,}[0-9]{2}[- ]{0,}[0-9]{2})|([0-9]{3}[- ]{0,}'
'[0-9]{1}[- ]{0,}[0-9]{3})|([0-9]{2}[- ]{0,}[0-9]{3}[- ]{0,}[0-9]{2}))/", $phone)){
	$i++;
}else{$prover3='<div class="valid">Некорректный номер телефона</div>';}

if(preg_match("#^[a-zA-Z0-9]{6,14}$#", $password)) {
	$i++;
}else{$prover4='<div class="valid">Пароль должен иметь длинну от 6 до 14 символов</div>';}

if($password==$password2) {
	$i++;
}else{$prover5='<div class="valid">Пароли не совпрадают</div>';}

$user = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM User WHERE Email='$email'"));
if(empty($user)){
	$i++;
	}else{ $prover2='<div class="valid">E-mail уже используется</div>';}
if($i==6){
	$query2="INSERT INTO User(Name, Email, Password, Phone, Role) VALUES('$name', '$email', '$password','$phone','Пользователь');";
	mysqli_query($link, $query2);
	
	$_SESSION['auth'] = true;
	$_SESSION['name'] =	$name;
	$_SESSION['phone'] = $phone;
	$_SESSION['email'] = $email;
	$_SESSION['role'] = $role;

	echo '<meta http-equiv="refresh" content="1;URL=index.php" />';
}
}
?>
<script src="https://unpkg.com/imask"></script>





<style>input{
padding: 10px;
border-radius: 10px;
width:200px;

}
</style>
<center>
<div class="cent" id="register">
	<form class="form" method="POST" autocomplete="on">
	<hr>
		<h1>Регистрация</h1>
		<hr>
		<br>
			<p>ФИО<p>
			<input class="textbox" name="name" placeholder="ФИО" value='<? echo $name;?>' required />
			<? echo $prover;?><br>
			<p>Электронная почта<p>
			<input class="textbox" name="email" type='email' id='email'  placeholder="E-mail" value='<? echo $email;?>' required />
			<? echo $prover2;?><br>
			<p>Номер телефона<p>
			<p style="font-size:10px;">Пример: 79000000000</p>
			<input class="textbox" name="phone" id='phone'  placeholder="Номер телефона" value='<? echo $phone;?>' required />
			<? echo $prover3;?><br>
			<p>Пароль<p>
			<input class="textbox" type="password" name="password" placeholder="Пароль" required />
			<? echo $prover4;?><br>
			<p>Повторите пароль<p>
			<input class="textbox" type="password" name="password2" placeholder="Повторите пароль" required />
			<? echo $prover5;?><br>
			<input type="checkbox" class="checkbox" name="option" value="a2" required />
			<span>Согласие на обработку персональных данных</span><br><br>
			<input class="button" style="width:25%;" type="submit" value="Зарегистрироваться"><br><br>
			<a href="login.php">Авторизация</a>
			<?
				if($i==6){
					echo '<p style="color:green; font-family: "Open Sans, sans-serif;">Регистрация прошла успешна</p>';
				}
			?>
	</form>
</div>
			</center>
			<script>
//Код jQuery, установливающий маску для ввода телефона элементу input
//1. После загрузки страницы,  когда все элементы будут доступны выполнить...
$(function(){
  //2. Получить элемент, к которому необходимо добавить маску
  $("#phone").mask("+7(999) 999-9999");
});
</script>
<script>
$('.email').mask("email", {
	translation: {
		"A": { pattern: /[\w@\-.+]/, recursive: true }
	}
});
</script>
<script>
  $(document).ready(function(){   
    $("#contactsForm").inputmask("email")
  });
</script>


<?php require_once('footer.php');?>
