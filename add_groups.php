<?php
    require_once('header.php');

    $error = "";
    if(!empty($_POST["ggo"])) {
        $name = htmlspecialchars($_POST["name"]);
        if(empty($name)) {
            $error = "Не заполнены все поля";
        } else {
            mysqli_query($link, "INSERT INTO `groups` (`group`) VALUES ('{$name}');") or die(mysqli_error($link));
            echo "<script>location.href='groups.php'</script>";
        }
    }
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


<div class="container text-center">
    <h1>Добавить группу</h1>
    <?php if(!empty($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>
    <form class="form" method="POST" enctype="multipart/form-data" autocomplete="on">
        <label>
            Название группы:
            <input type="text" name="name" class="form-control" value="<?php echo $_POST["name"]; ?>" style="font-weight: normal;" required />
        </label>
        
        <div>
            <input class="btn btn-primary" type="submit" name="ggo" value="Сохранить" />
        </div>
    </form>
</div>


<?php require_once('footer.php'); ?>
