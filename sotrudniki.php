<?php require_once('header.php');
?>
<style>
  #form-wrap {
  opacity: 0;
  transition: opacity .5s;
}

#form-wrap.open {
  transition: opacity .5s;
  opacity: 1;
}
</style>
<ol style='text-align:center' class="breadcrumb">
<li> <a href="list.php">Все документы</a></li>	
            <li><a href='adddocument.php'>Добавить документ</a></li>
            <li><a href="addsotrudnik.php">Добавить сотрудника</a></li>
          <li class='active'>Пользователи</a></li>
          <li><a href="stat1.php">Статистика</a></li>

    </ol>

    <?php
    //Если переменная Name передана
    if (isset($_POST["Name"])) {
      //Если это запрос на обновление, то обновляем
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($link, "UPDATE `user` SET `Name` = '{$_POST['Name']}',`Email` = '{$_POST['Email']}', `Password` = '{$_POST['Password']}',`Phone` = '{$_POST['Phone']}',`Role` = '{$_POST['Role']}' WHERE `ID`={$_GET['red_id']}");
      } else {
          //Иначе вставляем данные, подставляя их в запрос
          $sql = mysqli_query($link, "INSERT INTO `user` (`Name`, `Email`,`Password`, `Phone`,`Role`) VALUES ('{$_POST['Name']}', '{$_POST['Email']}','{$_POST['Password']}','{$_POST['Phone']}','{$_POST['Role']}')");
      }

      //Если вставка прошла успешно
      if ($sql) {
        echo '<center><p>Успешно!</p></center>';
      } else {
        echo '<center><p>Произошла ошибка: ' . mysqli_error($link) . '</p></center>';
      }
    }

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($link, "DELETE FROM `user` WHERE `id` = {$_GET['del_id']}");
      if ($sql) {
        echo "<center><p>Сотрудник удален.</p></center>";
      } else {
        echo '<p><center>Произошла ошибка: ' . mysqli_error($link) . '</p></center>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные. Для начала достанем их из БД
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($link, "SELECT `id`, `Name`, `Email` , `Password` , `Phone`, `Role` FROM `user` WHERE `id`={$_GET['red_id']}");
      $user = mysqli_fetch_array($sql);
    }
  ?>

  <table border='2'>

    <tr>
      <th>id</th>
      <th>ФИО</th>
      <th>Email</th>
      <th>Пароль</th>
      <th>Номер телефона</th>
      <th>Роль</th>
      <th>Удаление</th>
      <th>Редактирование</th>
    </tr>
    <?php


      $sql = mysqli_query($link, 'SELECT `id`, `Name`,`Email`,`Password`,`Phone`,`Role`   FROM `user` where `Role`!= "Администратор"');


      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
             "<td>{$result['id']}</td>" .
             "<td>{$result['Name']}</td>" .
             "<td>{$result['Email']} </td>" .
             "<td>{$result['Password']}</td>" .
             "<td>{$result['Phone']}</td>" .
             "<td>{$result['Role']} </td>" .
             "<td><a  onclick='return proverka();' style='color:red' href='?del_id={$result['id']}'>Удалить</a></td>" .
             "<td ><button onclick='openForm()'  ><a   href='?red_id={$result['id']}'  >Изменить</a></td>" .
             '</tr>';
      }
    ?>
  </table>

<br>
<center>
<div id='form-wrap'>
<form role="form" action="" autocomplete="off" method="POST">
    <table>
    <tr>
        <th>ФИО:</th>
        <th>Электронная почта:</td>
        <th>Пароль:</td>
        <th>Номер телефона:</td>
        <th>Роль:</td>
        
        <tr>
        <td><input type="text" name="Name" size="35" value="<?= isset($_GET['red_id']) ? $user['Name'] : ''; ?>"></td>

        <td><input type="text" name="Email" type='email' id='email'  placeholder="E-mail"  size="35" value="<?= isset($_GET['red_id']) ? $user['Email'] : ''; ?>"></td>

        <td><input type="text" name="Password" size="35" value="<?= isset($_GET['red_id']) ? $user['Password'] : ''; ?>"></td>
      


        <td><input type="text" name="Phone" id='phone' size="35" value="<?= isset($_GET['red_id']) ? $user['Phone'] : ''; ?>"></td>


        <td><input type="text" name="Role" size="35" value="<?= isset($_GET['red_id']) ? $user['Role'] : ''; ?>"> </td>


        <td colspan="2"><input type="submit" size="35"  value="Изменить" onclick="closeForm()"></td>

      </tr>
    </table>
  </form>
</div>
</center>
<center>
<p>
            Распечатать базу данных сотрудников - <button onclick="exp()" class="button">Распечатать</button>
          </p>
</center>

<script src="js/xlsx.core.min.js"></script>
<script src="js/FileSaver.js"></script>
<script src="js/tableexport.js"></script>
<script>
  function exp() {
    TableExport(document.getElementsByTagName("table"));
  }
</script>
<?php

?>


<script>
function dateFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  console.log(input);
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[5];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
const formWrap = document.getElementById('form-wrap');

function openForm() {
    formWrap.classList.add('open');
}
function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<script>
function proverka() {
    if (confirm("Точно ли вы хотите удалить?")) {
        return true;
    } else {
        return false;
    }
}
</script>
<script>
//Код jQuery, установливающий маску для ввода телефона элементу input
//1. После загрузки страницы,  когда все элементы будут доступны выполнить...
$(function(){
  //2. Получить элемент, к которому необходимо добавить маску
  $("#phone").mask("+7(999) 999-9999");
});
</script>
    <?php require_once('footer.php');
?>
