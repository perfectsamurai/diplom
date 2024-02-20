<?php require_once('header.php');
if(!empty($_POST['email']) and !empty($_POST['password'])){
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	$query = "SELECT * FROM User WHERE Email = '$email'";
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
	if(!empty($user)){
		$result = mysqli_query($link, "SELECT * FROM User WHERE Password='$password' and Email='$email'");
		$user = mysqli_fetch_assoc($result);
		if(!empty($user)){
			session_start();
			$result = mysqli_query($link, "SELECT * FROM User WHERE Password='$password'");
			$res = mysqli_fetch_assoc($result);
			$role = $res['Role'];
			$name = $res['Name'];
			$phone = $res['Phone'];
			$id = $res['id'];
			
			$_SESSION['auth'] = true;
			$_SESSION['name'] =	$name;
			$_SESSION['phone'] = $phone;
			$_SESSION['email'] = $email;
			$_SESSION['id'] = $id;
			$_SESSION['role'] = $role;		
			switch($role){
				case'Администратор':
				echo '<meta http-equiv="refresh" content="1;URL=index.php" />';
				break;
				case 'Пользователь':
				echo '<meta http-equiv="refresh" content="1;URL=index.php" />';
				break;
				case 'Сотрудник':
					echo '<meta http-equiv="refresh" content="1;URL=index.php" />';
					break;
			}

		}else{
			$prover2='<div class="valid">Неверный пароль</div>';
		}
	}else{
		$prover='<div class="valid">Неверный E-mail</div>';
	}
}
?>
 <style>input{
padding: 10px;
border-radius: 10px;
width:200px;
{

}
}
</style>
<center>
<div class="auth" id="login">
	<form class="form" method="POST" autocomplete="on">
	<hr>
		<h1>Авторизация</h1>
			<hr>
			<br>
			<p>Электронная почта</p>
			<input class="textbox" name="email" type='email' placeholder="E-mail" value='<? echo $email;?>' required />
			<? echo $prover;?><br><br>
			<p>Пароль</p>
			<input class="textbox" type="password" name="password" placeholder="Пароль" required />
			<? echo $prover2;?><br><br>
			<input class="button" style="width:10%; margin-right:px;" type="submit" value="Вход"><br><br>
			<a href="register.php">Регистрация</a>
	</form>
</div>
</center>
