<?php require_once('header.php');
?>
<style>
    input{
padding: 10px;
margin-top:20px;
border-radius: 10px;

}
.rrr{
    display: flex;
flex-wrap: wrap;
justify-content: space-around;
margin-bottom:50px;
margin-left: 20px;
margin-top:20px;

}
</style>
<ol style='text-align:center' class="breadcrumb" >
<li class="active">Все документы</li>	
            <li><a href="adddocument.php">Добавить документ</a></li>
            <li><a href="addsotrudnik.php">Добавить сотрудника</a></li>
          <li><a href="sotrudniki.php">Пользователи</a></li>
          <li><a href="stat1.php">Статистика</a></li>


    </ol>
    <div class="roma">
        <div class="rrr">

    <?php
        if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
            //удаляем строку из таблицы
            $sql = mysqli_query($link, "DELETE FROM documents WHERE id = {$_GET['del_id']}");
            if ($sql) {
              echo "<center><p>Сотрудник удален.</p></center>";
              echo "<script>history.back();</script>";
            } else {
              echo '<p><center>Произошла ошибка: ' . mysqli_error($link) . '</p></center>';
            }
          }
    ?>


<?php


    $result3 = mysqli_query($link, 'SELECT documents.id AS id, documents.category_id AS category_id, documents.sotrudnik_id AS sotrudnik_id, documents.date AS date, documents.tema AS tema, documents.group_id AS group_id, documents.location_id AS location_id, documents.fio AS fio, category.categoryname AS category, groups.group AS gruppa, locations.location AS mestopolojenie, user.Name AS sotrudniki FROM documents LEFT JOIN category ON category.id = documents.category_ID LEFT JOIN `groups` ON groups.id = documents.group_id LEFT JOIN locations ON locations.id = location_id LEFT JOIN user ON user.id = sotrudnik_id') or die(mysqli_error($link));
        $row3 = mysqli_num_rows($result3);
        echo '
 
        <form method="get" class="rom">
        <input type="submit" name="pok0" style="background-color:#337ab7;color:white;" value="Все документы">
        </form>

        <form method="get" class="rom">
        ФИО работника:
        <input list="name" name="gos" placeholder="Ведите ФИО" autocomplete="off"  type="text" value="';  echo $_REQUEST['gos']; echo'">
                    <datalist id="name">';
                            foreach ($result3 as $row3): 
                            echo "<option>" . $row3['sotrudniki'] . "</option>";
                    endforeach;  
                   echo' </datalist>
        <input type="submit" name="pok1" value="Показать">
        </form>
		
		
        <p style="margin-top:33px;margin-right:-30px;">Фильтрация по дате</p>
        <input type="date" id="myInput1"  onkeyup="dateFunction()" placeholder="Search for dates.." title="Type in a name">

		
		
        ';
					 $result5 = mysqli_query($link, 'SELECT documents.id AS id, documents.category_id AS category_id, documents.sotrudnik_id AS sotrudnik_id, documents.date AS date, documents.tema AS tema, documents.group_id AS group_id, documents.location_id AS location_id, documents.fio AS fio, category.categoryname AS category, groups.group AS gruppa, locations.location AS mestopolojenie, user.Name AS sotrudniki FROM documents LEFT JOIN category ON category.id = documents.category_ID LEFT JOIN `groups` ON groups.id = documents.group_id LEFT JOIN locations ON locations.id = location_id LEFT JOIN user ON user.id = sotrudnik_id') or die(mysqli_error($link));
        $row5 = mysqli_num_rows($result5);
        echo '
   
		
		
		 <form method="get" class="rom2">
       Категория работы:
        <input list="name1" name="gosi" placeholder="Введите категорию" autocomplete="off"  type="text" value="';  echo $_REQUEST['gosi']; echo'">
                    <datalist id="name1">';
                            foreach ($result5 as $row5): 
                            echo "<option>" . $row5['category'] . "</option>";
                    endforeach;  
                   echo' </datalist>
        <input type="submit" name="pok3" value="Показать">
        </form>
        
		';


        $result8 = mysqli_query($link, 'SELECT documents.id AS id, documents.category_id AS category_id, documents.sotrudnik_id AS sotrudnik_id, documents.date AS date, documents.tema AS tema, documents.group_id AS group_id, documents.location_id AS location_id, documents.fio AS fio, category.categoryname AS category, groups.group AS gruppa, locations.location AS mestopolojenie, user.Name AS sotrudniki FROM documents LEFT JOIN category ON category.id = documents.category_id LEFT JOIN `groups` ON groups.id = documents.group_id LEFT JOIN locations ON locations.id = location_id LEFT JOIN user ON user.id = sotrudnik_id') or die(mysqli_error($link));
        $row8 = mysqli_num_rows($result5);
        echo '
   
		
		
		 <form method="get" class="rom3">
       Поиск по теме работы:
        <input list="name2" name="gosi2" placeholder="Введите тему" autocomplete="off"  type="text" value="';  echo $_REQUEST['gosi2']; echo'">
                    <datalist id="name2">';
                            foreach ($result8 as $row8): 
                            echo "<option>" . $row8['tema'] . "</option>";
                    endforeach;  
                   echo' </datalist>
        <input type="submit" name="pok4" value="Показать">
        </form>
     
        
		';
        
        $result9 = mysqli_query($link, 'SELECT documents.id AS id, documents.category_id AS category_id, documents.sotrudnik_id AS sotrudnik_id, documents.date AS date, documents.tema AS tema, documents.group_id AS group_id, documents.location_id AS location_id, documents.fio AS fio, category.categoryname AS category, groups.group AS gruppa, locations.location AS mestopolojenie, user.Name AS sotrudniki FROM documents LEFT JOIN category ON category.id = documents.category_id LEFT JOIN `groups` ON groups.id = documents.group_id LEFT JOIN locations ON locations.id = location_id LEFT JOIN user ON user.id = sotrudnik_id') or die(mysqli_error($link));
        $row8 = mysqli_num_rows($result5);
        echo '
   
		
		
		 <form method="get" class="rom4">
                    Поиск по местоположению документа:
        <input list="name3" name="gosi34" placeholder="Введите местоположение" autocomplete="off"  type="text" value="';  echo $_REQUEST['gosi34']; echo'">
                    <datalist id="name2">';
                            foreach ($result9 as $row9): 
                            echo "<option>" . $row9['mestopolojenie'] . "</option>";
                    endforeach;  
                   echo' </datalist>
        <input type="submit" name="pok56" value="Показать">
        </form>
        ';
        
        
        
        
        $result10 = mysqli_query($link, 'SELECT documents.id AS id, documents.category_id AS category_id, documents.sotrudnik_id AS sotrudnik_id, documents.date AS date, documents.tema AS tema, documents.group_id AS group_id, documents.location_id AS location_id, documents.fio AS fio, category.categoryname AS category, groups.group AS gruppa, locations.location AS mestopolojenie, user.Name AS sotrudniki FROM documents LEFT JOIN category ON category.id = documents.category_id LEFT JOIN `groups` ON groups.id = documents.group_id LEFT JOIN locations ON locations.id = location_id LEFT JOIN user ON user.id = sotrudnik_id') or die(mysqli_error($link));
        $row8 = mysqli_num_rows($result5);
        echo '
   
		
		
		 <form method="get" class="rom5">
Поиск по ФИО ученика:
         <input list="name4" name="gosi4" placeholder="Введите ФИО ученика" autocomplete="off"  type="text" value="';  echo $_REQUEST['gosi4']; echo'">
                    <datalist id="name2">';
                            foreach ($result10 as $row10): 
                            echo "<option>" . $row10['fio'] . "</option>";
                    endforeach;  
                   echo' </datalist>
        <input type="submit" name="pok6" value="Показать">
        </form>
        </div>' 




        ;

            if(isset($_GET['pok0'])){
            $result = mysqli_query($link, "SELECT documents.id AS id, documents.category_id AS category_id, documents.sotrudnik_id AS sotrudnik_id, documents.date AS date, documents.tema AS tema, documents.group_id AS group_id, documents.location_id AS location_id, documents.fio AS fio, category.categoryname AS category, groups.group AS gruppa, locations.location AS mestopolojenie, user.Name AS sotrudniki FROM documents LEFT JOIN category ON category.id = documents.category_ID LEFT JOIN `groups` ON groups.id = documents.group_id LEFT JOIN locations ON locations.id = location_id LEFT JOIN user ON user.id = sotrudnik_id ") or die(mysqli_error($link));
            $row = mysqli_num_rows($result);

                echo '
                <table id="myTable" class="table_sort" border="1" >
                <tr>
                    <th>Категория работы</th>
					<th>ФИО работника</th>
                    <th>Дата добавления</th>
                    <th>Тема</th>
                    <th>Группа</th>
                    <th>Местоположение документа</th>
                    <th>ФИО ученика</th>
                    <th>Действия</th>
                </tr>
            ';
                foreach ($result as $row) {
                    echo '
            <form method="get">
              <tr>
                    <input style="width:1px;"    value="' . $row['id'] . '" class="adpid" name="id" type="hidden">
                    <td><p class="adp">' . $row['category'] . '</p></td>
					<td><p class="adp">' . $row['sotrudniki'] . '</p></td>
					
                    <td><p class="adp">' . $row['date'] . '</p></td>
					 <td><p class="adp">' . $row['tema'] . '</p></td>
					  <td><p class="adp">' . $row['gruppa'] . '</p></td>
                      <td><p class="adp">' . $row['mestopolojenie'] . '</p></td>
                      <td><p class="adp">' . $row['fio'] . '</p></td>
                      <td><a onclick="return proverka();" style="color:red" href="?del_id={$result["id"]}">Удалить</a></td>
                    ';
                    }
             echo ' 
                </tr>
            </form>
            ';
                
                echo '</table>';}


                if(isset($_GET['pok1'])){
               $name = $_GET['gos'];
            $result = mysqli_query($link, "SELECT documents.id AS id, documents.category_id AS category_id, documents.sotrudnik_id AS sotrudnik_id, documents.date AS date, documents.tema AS tema, documents.group_id AS group_id, documents.location_id AS location_id, documents.fio AS fio, category.categoryname AS category, groups.group AS gruppa, locations.location AS mestopolojenie, user.Name AS sotrudniki FROM documents LEFT JOIN category ON category.id = documents.category_ID LEFT JOIN `groups` ON groups.id = documents.group_id LEFT JOIN locations ON locations.id = location_id LEFT JOIN user ON user.id = sotrudnik_id where user.Name='$name'") or die(mysqli_error($link));
            $row = mysqli_num_rows($result);

                       echo '
                <table id="myTable" class="table_sort" border="1" >
                <tr>
                   <th>Категория работы</th>
					<th>ФИО работника</th>
                    <th>Дата добавления</th>
                    <th>Тема</th>
                    <th>Группа</th>
                    <th>Местоположение документа</th>
                    <th>ФИО ученика</th>
                </tr>
            ';
                foreach ($result as $row) {
                    echo '
            <form method="get">
              <tr>
                    <input style="width:1px;"    value="' . $row['id'] . '" class="adpid" name="id" type="hidden">
                    <td><p class="adp">' . $row['category'] . '</p></td>
					<td><p class="adp">' . $row['sotrudniki'] . '</p></td>
                    <td><p class="adp">' . $row['date'] . '</p></td>
					<td><p class="adp">' . $row['tema'] . '</p></td>
					<td><p class="adp">' . $row['gruppa'] . '</p></td>
                    <td><p class="adp">' . $row['mestopolojenie'] . '</p></td>
                    <td><p class="adp">' . $row['fio'] . '</p></td>
                    ';
                    }
             echo ' 
                </tr>
            </form>
            ';
			
                
                echo '</table>';}
				                if(isset($_GET['pok3'])){
               $name = $_GET['gosi'];
            $result = mysqli_query($link, "SELECT documents.id AS id, documents.category_id AS category_id, documents.sotrudnik_id AS sotrudnik_id, documents.date AS date, documents.tema AS tema, documents.group_id AS group_id, documents.location_id AS location_id, documents.fio AS fio, category.categoryname AS category, groups.group AS gruppa, locations.location AS mestopolojenie, user.Name AS sotrudniki FROM documents LEFT JOIN category ON category.id = documents.category_ID LEFT JOIN `groups` ON groups.id = documents.group_id LEFT JOIN locations ON locations.id = location_id LEFT JOIN user ON user.id = sotrudnik_id where category.categoryname='$name'") or die(mysqli_error($link));
            $row = mysqli_num_rows($result);

                       echo '
                <table id="myTable" class="table_sort" border="1" >
                <tr>
                   <th>Категория работы</th>
					<th>ФИО работника</th>
                    <th>Дата добавления</th>
                    <th>Тема</th>
                    <th>Группа</th>
                    <th>Местоположение документа</th>
                    <th>ФИО ученика</th>
                    <th>Действия</th>
                </tr>
            ';
                foreach ($result as $row) {
                    echo '
            <form method="get">
              <tr>
                    <input style="width:1px;"    value="' . $row['id'] . '" class="adpid" name="id" type="hidden">
                    <td><p class="adp">' . $row['category'] . '</p></td>
					<td><p class="adp">' . $row['sotrudniki'] . '</p></td>
                    <td><p class="adp">' . $row['date'] . '</p></td>
					<td><p class="adp">' . $row['tema'] . '</p></td>
					<td><p class="adp">' . $row['gruppa'] . '</p></td>
                    <td><p class="adp">' . $row['mestopolojenie'] . '</p></td>
                    <td><p class="adp">' . $row['fio'] . '</p></td>
                    <td><a  onclick="return proverka();" style="color:red" href="?del_id=' . $row["id"] . '">Удалить</a></td>
                    ';
                    }
             echo ' 
                </tr>
            </form>
            ';
			
                
                echo '</table>';}
                

        if(isset($_GET['pok4'])){
            $name = $_GET['gosi2'];
         $result = mysqli_query($link, "SELECT documents.id AS id, documents.category_id AS category_id, documents.sotrudnik_id AS sotrudnik_id, documents.date AS date, documents.tema AS tema, documents.group_id AS group_id, documents.location_id AS location_id, documents.fio AS fio, category.categoryname AS category, groups.group AS gruppa, locations.location AS mestopolojenie, user.Name AS sotrudniki FROM documents LEFT JOIN category ON category.id = documents.category_id LEFT JOIN `groups` ON groups.id = documents.group_id LEFT JOIN locations ON locations.id = location_id LEFT JOIN user ON user.id = sotrudnik_id where documents.tema='$name'") or die(mysqli_error($link));
         $row = mysqli_num_rows($result);

                    echo '
             <table id="myTable" class="table_sort" border="1" >
             <tr>
                <th>Категория работы</th>
                <th>ФИО работника</th>
                <th>Дата добавления</th>
                <th>Тема</th>
                <th>Группа</th>
                <th>Местоположение документа</th>
                <th>ФИО ученика</th>
             </tr>
         ';
             foreach ($result as $row) {
                 echo '
         <form method="get">
           <tr>
                 <input style="width:1px;"    value="' . $row['id'] . '" class="adpid" name="id" type="hidden">
                 <td><p class="adp">' . $row['category'] . '</p></td>
                 <td><p class="adp">' . $row['sotrudniki'] . '</p></td>
                 <td><p class="adp">' . $row['date'] . '</p></td>
                 <td><p class="adp">' . $row['tema'] . '</p></td>
                 <td><p class="adp">' . $row['gruppa'] . '</p></td>
                 <td><p class="adp">' . $row['mestopolojenie'] . '</p></td>
                 <td><p class="adp">' . $row['fio'] . '</p></td>
                 ';
                 }
          echo ' 
             </tr>
         </form>
         ';
         
             
             echo '</table>';}

             if(isset($_GET['pok56'])){
                $name = $_GET['gosi34'];
             $result = mysqli_query($link, "SELECT documents.id AS id, documents.category_id AS category_id, documents.sotrudnik_id AS sotrudnik_id, documents.date AS date, documents.tema AS tema, documents.group_id AS group_id, documents.location_id AS location_id, documents.fio AS fio, category.categoryname AS category, groups.group AS gruppa, locations.location AS mestopolojenie, user.Name AS sotrudniki FROM documents LEFT JOIN category ON category.id = documents.category_ID LEFT JOIN `groups` ON groups.id = documents.group_id LEFT JOIN locations ON locations.id = location_id LEFT JOIN user ON user.id = sotrudnik_id where locations.location='$name'") or die(mysqli_error($link));
             $row = mysqli_num_rows($result);
 
                        echo '
                 <table id="myTable" class="table_sort" border="1" >
                 <tr>
                    <th>Категория работы</th>
                    <th>ФИО работника</th>
                    <th>Дата добавления</th>
                    <th>Тема</th>
                    <th>Группа</th>
                    <th>Местоположение документа</th>
                    <th>ФИО ученика</th>
                 </tr>
             ';
                 foreach ($result as $row) {
                     echo '
             <form method="get">
               <tr>
                     <input style="width:1px;"    value="' . $row['id'] . '" class="adpid" name="id" type="hidden">
                     <td><p class="adp">' . $row['category'] . '</p></td>
                     <td><p class="adp">' . $row['sotrudniki'] . '</p></td>
                     <td><p class="adp">' . $row['date'] . '</p></td>
                     <td><p class="adp">' . $row['tema'] . '</p></td>
                     <td><p class="adp">' . $row['gruppa'] . '</p></td>
                     <td><p class="adp">' . $row['mestopolojenie'] . '</p></td>
                     <td><p class="adp">' . $row['fio'] . '</p></td>
                     ';
                     }
              echo ' 
                 </tr>
             </form>
             ';
             echo '</table>';}




             if(isset($_GET['pok6'])){
                $name = $_GET['gosi4'];
             $result = mysqli_query($link, "SELECT documents.id AS id, documents.category_id AS category_id, documents.sotrudnik_id AS sotrudnik_id, documents.date AS date, documents.tema AS tema, documents.group_id AS group_id, documents.location_id AS location_id, documents.fio AS fio, category.categoryname AS category, groups.group AS gruppa, locations.location AS mestopolojenie, user.Name AS sotrudniki FROM documents LEFT JOIN category ON category.id = documents.category_ID LEFT JOIN `groups` ON groups.id = documents.group_id LEFT JOIN locations ON locations.id = location_id LEFT JOIN user ON user.id = sotrudnik_id where documents.fio='$name'") or die(mysqli_error($link));
             $row = mysqli_num_rows($result);
 
                        echo '
                 <table id="myTable" class="table_sort" border="1" >
                 <tr>
                    <th>Категория работы</th>
                    <th>ФИО работника</th>
                    <th>Дата добавления</th>
                    <th>Тема</th>
                    <th>Группа</th>
                    <th>Местоположение документа</th>
                    <th>ФИО ученика</th>
                 </tr>
             ';
                 foreach ($result as $row) {
                     echo '
             <form method="get">
               <tr>
                     <input style="width:1px;"    value="' . $row['id'] . '" class="adpid" name="id" type="hidden">
                     <td><p class="adp">' . $row['category'] . '</p></td>
                     <td><p class="adp">' . $row['sotrudniki'] . '</p></td>
                     <td><p class="adp">' . $row['date'] . '</p></td>
                     <td><p class="adp">' . $row['tema'] . '</p></td>
                     <td><p class="adp">' . $row['gruppa'] . '</p></td>
                     <td><p class="adp">' . $row['mestopolojenie'] . '</p></td>
                     <td><p class="adp">' . $row['fio'] . '</p></td>
                     ';
                     }
              echo ' 
                 </tr>
             </form>
             ';
             echo '</table>';}
				?>
				
				
				
				
	
		
	
                <br>
<center>
<p>
            Распечатать таблицу выбранных документов - <button onclick="exp()" class="button">Распечатать</button>
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
      function dateFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput1");
  console.log(input);
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
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
</script>
<?php require_once('footer.php');
?>
