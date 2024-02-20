<?php require_once('header.php');
?>
	<?php

    mysqli_query($link, "SET NAMES 'utf8'");

    if(isset($_POST['ggo'])) {
      $tema = explode(";", strip_tags($_POST['tema']));
      $fio = explode(";", strip_tags($_POST['fio']));
      $i = 0;

      if(count($tema) != count($fio)) {
        $i++;
        $prover='<div class="valid">Некорректные данные в таблице документов</div>';
      } else {
        $insertValues = "";
        for($a = 0; $a < count($tema); $a++) {
          $gruppa = strip_tags($_POST['gruppa']);
          $sotrudniki= strip_tags($_POST['sotrudniki']);	
          $category= strip_tags($_POST['category']);
          $date= strip_tags($_POST['date']);
          $mestopolojenie= strip_tags($_POST['mestopolojenie']);

          $temaValue = $tema[$a];
          $fioValue = $fio[$a];

          $insertValues .= "('$temaValue','$gruppa','$sotrudniki','$category','$date','$mestopolojenie','$fioValue'), ";
        }

        $insertValues = rtrim($insertValues, ", ");

        if(!empty($insertValues)) {
          $query2 = "INSERT INTO documents (`tema`,group_id,sotrudnik_id,category_id,`date`,location_id,`fio`) VALUES{$insertValues};";
          mysqli_query($link, $query2);
          $i = 2;
        } else {
          $i++;
          $prover='<div class="valid">Таблица с документами не заполнена</div>';
        }
      }
    }
  ?>

  <style>input{
padding: 10px;
border-radius: 10px;
width:300px;}
p{
  margin-top: 10px;
}


</style>

<ol style='text-align:center' class="breadcrumb">
<li> <a href="list.php">Все документы</a></li>	
            <li class='active'>Добавить документ</a></li>
            <li><a href="addsotrudnik.php">Добавить сотрудника</a></li>
          <li><a href="sotrudniki.php">Пользователи</a></li>
          <li><a href="stat1.php">Статистика</a></li>

          
    </ol>

    <div class="container text-center">
                <form class="form" method="POST" enctype="multipart/form-data" autocomplete="on">
	<p style="font-size:20px;">Новый документ</p>
    <br>
    <div class='rrr'>

      <div class="panel">
        <label>
          Количество документов:<br>
          <input type="number" class="table_documents_add-count" max="30" min="1" step="1" value="1" />
        </label>
        <button class="table_documents_add btn btn-primary" type="button">Добавить документ</button>
        <div id="importform">
          <input type="file" id="excelfile" />  
          <button type="button" class="btn btn-primary" id="excelupload">Импортировать</button>
        </div>
      </div>
      <table id="table_documents">
        <thead>
          <tr>
            <th colspan="2" class="table_documents_fio">⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀ФИО ученика</th>
            <th colspan="2" class="table_documents_name"></th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>

      <input class="hidden" id="fioValue" name="fio" value='' />
      <input class="hidden" id="temaValue" name="tema" value='' />

    <p style="font-size:15px;margin-top:20px;">Группа ученика (<a href="groups.php" target="_blank">управление группами</a>):</p>
        <select name="gruppa">
        <?php
        $groups = $link->query("SELECT * FROM `groups`");
        while ($group = $groups->fetch_assoc()) {
            echo "<option value='${group['id']}'>${group['group']}</option>";
        }
        ?>
        </select>
         <br>
	<br>
  <p style="font-size:15px;margin-top:20px;">Категория документа (<a href="categories.php" target="_blank">управление категорями</a>):</p>
	<select class="select" name="category" style='padding: 10px;
border-radius: 10px;
width:300px;'>

        <?php
        $categories = $link->query("SELECT * FROM category");
        while ($category = $categories->fetch_assoc()) {
            echo "<option value='{$category['id']}' data-id='{$category['id']}'>${category['categoryname']}</option>";
        }
        ?>

		</select><? echo $prover2;?>

	<? echo $prover;?><br><br>
    <br>
    <br>
  <p style="font-size:15px;margin-top:20px;">Местоположение документа (<a href="locations.php" target="_blank">управление местоположениями</a>):</p>
	<select class="select" name="mestopolojenie" style='padding: 10px;
border-radius: 10px;
width:300px;'>

        <?php
        $locations = $link->query("SELECT * FROM locations");
        while ($location = $locations->fetch_assoc()) {
            echo "<option value='${location['id']}'>${location['location']}</option>";
        }
        ?>
		</select><? echo $prover2;?>

	<? echo $prover;?><br>
    <br>    <br>
	
    <p style="font-size:15px;margin-top:30px;">Сотрудник добавивший документ:</p>
    
    <select class="select" name="sotrudniki" style='  padding: 10px;
border-radius: 10px;
width:300px;
margin-top:20px;'>
      <?php
      $users = $link->query("SELECT * FROM user where  `Role`= 'Сотрудник'");
      while ($user = $users->fetch_assoc()) {
          echo "<option value='${user['id']}'>${user['Name']}</option>";
      }
      ?>
		</select><? echo $prover2;?>
	<? echo $prover;?><br>
	<br>
    <br>
    <p>Дата добавления:</p><input type="date" name="date" required />
	<br>
    <br>
<br>
	<input class="button253"  type="submit"  name="ggo" value="Добавить"><br><br>
	<?
		if($i==2){
			echo '<p style="color:green; font-family: "Open Sans", sans-serif;">Успешно добавлено</p>';
		}
	?>
    
</form>
	</div>
	    </div>

    </div>

    <?php require_once('footer.php');
?>

<script src="/js/xlsx.full.min.js"></script>
<script src="/js/jszip.js"></script>
<script>
  $(document).ready(function() {
    $(".form").submit(function() {
      if($(this).find("#fioValue").val() == "" || $(this).find("#temaValue").val() == "") {
        alert("Список документов пуст");
        return false;
      } else {
        if($(this).find("#fioValue").val().split(";").length != $(this).find("#temaValue").val().split(";").length) {
          alert("Пожалуйста, заполните содержимое таблицы документов");
          return false;
        }
      }
    });

    $(".table_documents_add").click(function() {
      let newCount = parseInt($(".table_documents_add-count").val());

      if(newCount <= 0 || newCount > 30) {
        alert("Количество новых строк должно быть от 1 до 30");
        return false;
      }

      for(let i = 0; i < newCount; i++) {
        $("#table_documents tbody").append(`
          <tr>
            <td><span class='table_documents-number'></span></td>
            <td><input type='text' class='table_documents_input-fio' pattern='[А-Яа-яЁё]*' required /></td>
            <td><input type='text' class='table_documents_input-tema' pattern='[А-Яа-яЁё]*' required /></td>
            <td><button class='btn btn-danger table_documents_btn-delete' type='button'>Удалить</button></td>
          </tr>
        `);
      }

      generateFormValues();
    });
    
    $("body").on("click", ".table_documents_btn-delete", function() {
      $(this).closest("tr").remove();
      generateFormValues();
    });

    $("body").on("keyup change", "#table_documents input", function() {
      generateFormValues();
    });

    function generateFormValues() {
      let fioValue = "";
      let temaValue = "";

      $("#table_documents .table_documents_input-fio").each(function() {
        let val = $(this).val();
        if(val != "") {
          fioValue += val.replaceAll(";", "") + ";";
        }
      });
      fioValue = fioValue.substring(0, fioValue.length - 1);

      $("#table_documents .table_documents_input-tema").each(function() {
        let val = $(this).val();
        if(val != "") {
          temaValue += val.replaceAll(";", "") + ";";
        }
      });
      temaValue = temaValue.substring(0, temaValue.length - 1);

      $("#fioValue").val(fioValue);
      $("#temaValue").val(temaValue);
    }

    function updateCategoryColumnTitle() {
        let columnTitle;
        switch($("select[name='category'] option:selected").data("id")) {
          case 1:
            columnTitle = "⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀Название дисциплины(ПМ)";
            break;
          case 2:
            columnTitle = "⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀Тема  курсовой работы ";
            break;
          case 3:
            columnTitle = "⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀Тема  дипломной работы";
            break;
          case 4:
            columnTitle = "⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀Название дисциплины(УП)";
            break;
          case 5:
            columnTitle = "⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀Тема  курсового проекта";
            break;
          default:
            columnTitle = "⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀Тема работы";
            break;
        }
        
        $(".table_documents_name").html(columnTitle);
    }

    updateCategoryColumnTitle();
    $("select[name='category']").change(function() {
      updateCategoryColumnTitle();
    });

    $("body").on("click", "#excelupload", function () {
        //Reference the FileUpload element.
        var fileUpload = $("#excelfile")[0];
 
        //Validate whether File is valid Excel file.
        var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xls|.xlsx)$/;
        if (regex.test(fileUpload.value.toLowerCase())) {
            if (typeof (FileReader) != "undefined") {
                var reader = new FileReader();
 
                //For Browsers other than IE.
                if (reader.readAsBinaryString) {
                    reader.onload = function (e) {
                        ProcessExcel(e.target.result);
                    };
                    reader.readAsBinaryString(fileUpload.files[0]);
                } else {
                    //For IE Browser.
                    reader.onload = function (e) {
                        var data = "";
                        var bytes = new Uint8Array(e.target.result);
                        for (var i = 0; i < bytes.byteLength; i++) {
                            data += String.fromCharCode(bytes[i]);
                        }
                        ProcessExcel(data);
                    };
                    reader.readAsArrayBuffer(fileUpload.files[0]);
                }
            } else {
                alert("This browser does not support HTML5.");
            }
        } else {
            alert("Please upload a valid Excel file.");
        }
    });

    function ProcessExcel(data) {
        //Read the Excel File data.
        var workbook = XLSX.read(data, {
            type: 'binary'
        });
 
        //Fetch the name of First Sheet.
        var firstSheet = workbook.SheetNames[0];
 
        //Read all rows from First Sheet into an JSON array.
        var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);

       for(let i = 0; i < excelRows.length; i++) {
          let value = excelRows[i];
          $("#table_documents tbody").append(`
            <tr>
              <td><span class='table_documents-number'></span></td>
              <td><input type='text' class='table_documents_input-fio' pattern='[А-Яа-яЁё]*' value="` + value["ФИО"] +  `" required /></td>
              <td><input type='text' class='table_documents_input-tema' pattern='[А-Яа-яЁё]*' value="` + value["Тема"] +  `" required /></td>
              <td><button class='btn btn-danger table_documents_btn-delete' type='button'>Удалить</button></td>
            </tr>
          `);
        };

        $("#excelfile").val('');

        generateFormValues();
    };
  });
</script>