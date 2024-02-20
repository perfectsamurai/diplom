<?php require_once('header.php');
?><ol style='text-align:center' class="breadcrumb">
<li class="active">Мои документы</li>	
    </ol>
    <?
    echo '
                <table id="myTable" class="table_sort" border="1" >
                <tr>
                    <th>Категория работы</th>
					<th>ФИО работника</th>
                    <th> Дата добавления</th>
					 <th> Тема</th>
					 <th> Группа</th>
                     <th> Местоположение документа	</th>
                     <th> ФИО ученика   </th>
                </tr>
            ';
            ?>
    <?
    
    $name = $_SESSION['name'];
    		$query = "SELECT * FROM `documents` where `sotrudniki`= '$name' ";
            $result1 = mysqli_query($link, $query) or die(mysqli_error($link));
            for ($data = []; $row = mysqli_fetch_assoc($result1); $data[] = $row);
    $sum = 0;
            $result1 = '';
            foreach ($data as $elem) {

                $result1 .= '<tr>';

                $result1 .= '<td>' . $elem['category'] . '</td>';
                $result1 .= '<td>' . $elem['sotrudniki'] . '</td>';
                $result1 .= '<td>' . $elem['date'] . '</td>';
                $result1 .= '<td>' . $elem['tema'] . '</td>';
                $result1 .= '<td>' . $elem['gruppa'] . '</td>';
                $result1 .= '<td>' . $elem['mestopolojenie'] . '</td>';
                $result1 .= '<td>' . $elem['fio'] . '</td>';
                
                $result1 .= '</tr>';
                
            }
            echo $result1;
    ?>
