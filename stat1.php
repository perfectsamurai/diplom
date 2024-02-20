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
            <li><a href="sotrudniki.php">Пользователи</a></li>
          <li class='active'>Статистика</a></li>
    </ol>



<br>
<center>
 <script src="https://www.google.com/jsapi"></script>
  <script>
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(drawChart);
   function drawChart() {
    var data = google.visualization.arrayToDataTable([
     ['Год', 'Производ. практика','Курсовая работа', 'Дипломная работа', 'Учебная практика', 'Курсовой проект', 'Выпускная квалиф. работа '],
     ['2020', 421, 597,241,612,389,121],
     ['2021', 454, 623,276,683,412,136],
     ['2022', 438, 523,234,645,401,124],
    ]);
    var options = {
     title: 'Добавление документов',
     hAxis: {title: 'Год'},
     vAxis: {title: 'Кол-во документов'}
    };
    var chart = new google.visualization.ColumnChart(document.getElementById('oil'));
    chart.draw(data, options);
   }
  </script>
 </head>
 <body>
  <div id="oil" style="width: 1000px; height: 900px;"></div>
 </body>
</center>

    <?php require_once('footer.php');
?>
