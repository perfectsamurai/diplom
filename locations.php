<?php
    require_once('header.php');
    $result = mysqli_query($link, "SELECT * FROM `locations`;") or die(mysqli_error($link));
?>
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
            $sql = mysqli_query($link, "DELETE FROM `locations` WHERE id = {$_GET['del_id']}");
            if ($sql) {
              echo "<center><p>Местоположение удалено.</p></center>";
              echo "<script>history.back();</script>";
            } else {
              echo '<p><center>Произошла ошибка: ' . mysqli_error($link) . '</p></center>';
            }
          }
    ?>

<div class="container">
    <h1>Список местоположении</h1>
    <a href="add_locations.php" class="btn btn-primary">Добавить местоположение</a>
    <hr>
    <?php if($result->num_rows > 0): ?>
        <ul>
            <?php while($value = $result->fetch_assoc()): ?>
                <li><a href="edit_locations.php?id=<?php echo $value["id"]; ?>">#<?php echo $value["id"]; ?> <?php echo $value["location"]; ?></a> (<a onclick="return proverka();" style="color:red" href="?del_id=<?php echo $value["id"]; ?>">Удалить</a>)</li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <div class="alert alert-info">Список пуст</div>
    <?php endif; ?>
</div>

<script>
function proverka() {
    if (confirm("Точно ли вы хотите удалить?")) {
        return true;
    } else {
        return false;
    }
}
</script>

<?php require_once('footer.php'); ?>
