<?php require_once('header.php');
?>
	<?php

  
  


  mysqli_query($link, "SET NAMES 'utf8'");
  
    $Name = strip_tags($_POST['Name']);
    $Email = strip_tags($_POST['Email']);
    $Password= strip_tags($_POST['Password']);	
      $Phone= strip_tags($_POST['Phone']);
      $Role= strip_tags($_POST['Role']);
    $i = 0;
    
    if(preg_match("/^[a-zA-Za-яёА-ЯЁ0-9\s\-]+$/u", $Name)) {
      $i++;
    }else{ $prover='<div class="valid"></div>';}

    if(preg_match("/(8|7|\+7){0,1}[- \\\\(]{0,}([9][0-9]{2})[- \\\\)]{0,}(([0-9]{2}[- ]{0,}'.
'[0-9]{2}[- ]{0,}[0-9]{3})|([0-9]{3}[- ]{0,}[0-9]{2}[- ]{0,}[0-9]{2})|([0-9]{3}[- ]{0,}'
'[0-9]{1}[- ]{0,}[0-9]{3})|([0-9]{2}[- ]{0,}[0-9]{3}[- ]{0,}[0-9]{2}))/", $Phone)){
	$i++;
}else{$prover3='<div class="valid">Некорректный номер телефона</div>';}

    if($categ=="Выберите категорию"){
      $prover2='<div class="valid">Выберите категорию</div>';
    }else{ $i++;}
    

    
    if(isset($_POST['ggo'])){
      $query2 = "INSERT INTO user (`Name`,Email,`Password`,Phone,`Role`) VALUES('$Name','$Email','$Password','$Phone','$Role');";
      mysqli_query($link, $query2);
    }
    

  
  ?>
  <script src="https://unpkg.com/imask"></script>

  <style>input{
padding: 10px;
border-radius: 10px;
width:300px;
  }
</style>

<ol style='text-align:center' class="breadcrumb">
<li> <a href="list.php">Все документы</a></li>	
            <li ><a href='adddocument.php'>Добавить документ</a></li>
            <li class='active'>Добавить сотрудника</a></li>
          <li><a href="sotrudniki.php">Пользователи</a></li>
          <li><a href="stat1.php">Статистика</a></li>

    </ol>
    <center>
                <form class="form" method="POST" enctype="multipart/form-data" autocomplete="on">
	<p style="font-size:20px;">Добавление пользователя</p>
    <br>
    <p style="font-size:15px;">ФИО </p>
	<input class="textbox" name="Name" placeholder="ФИО" required value='<? echo $Name;?>' required /><br>
    <br>
    <p style="font-size:15px;">Электронная почта </p>
	<input class="textarea" rows="10" maxlength="256" name="Email" type="email" placeholder="Email " required  value='<? echo $Email;?>' required />
    <br>
	<br>

    <p style="font-size:15px;">Пароль</p>
	<input class="textarea" rows="10" maxlength="256" name="Password"  placeholder="Пароль " required  value='<? echo $Password;?>' required />
    <br>
	<br>
    <p style="font-size:15px;">Номер телефона</p>
    <p style="font-size:10px;">Пример: 123-456-7890</p>
    <input class="textbox" name="Phone" id='Phone'  placeholder="Номер телефона" value=''<? echo $Phone;?>' required />
    <br>
	<br>
  <p style="font-size:15px;">Роль пользователя</p>
	<select class="select" name="Role" style='  padding: 10px;
border-radius: 10px;
width:300px;'>
			<option value="Выберите категорию" disabled>Выберите роль</option>
			<option value="Администратор">Администратор</option>
			<option value="Сотрудник">Сотрудник</option>
			<option value="Пользователь">Пользователь</option>
		</select><? echo $prover2;?>

	<? echo $prover;?><br>
    <br>
	
	<br>
    <br>
	
<br>
	<input class="button253"  type="submit"  name="ggo" value="Добавить"><br><br>
	<?
		if($i==2){
			echo '<p style="color:green; font-family: "Open Sans", sans-serif;">Успешно добавлено</p>';
		}
	?>
    </div>
	    </div>
    </div>

</form>
	</center>
  <script>
//Код jQuery, установливающий маску для ввода телефона элементу input
//1. После загрузки страницы,  когда все элементы будут доступны выполнить...
$(function(){
  //2. Получить элемент, к которому необходимо добавить маску
  $("#Phone").mask("+7(999) 999-9999");
});
</script>
    <?php require_once('footer.php');
?>