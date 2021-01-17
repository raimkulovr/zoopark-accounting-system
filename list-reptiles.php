<?php
require_once 'autoload.php';
$size=10;
$page=1;
$reptileMap = new ReptileMap();
$count = $reptileMap->count();
$reptiles = $reptileMap->findAll($page*$size-$size, $size);
$header = 'Список рептилий';
require_once 'template/header.php';
?>

<div class="row">
<div class="col-xs-12">
<div class="box">
<section class="content-header">
    <h1><?=$header?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active"><?=$header?></li>
    </ol>
</section>
<div class="box-body">

<a class="btn btn-success" href="add-reptile.php">Добавить питомца</a>

</div>
<!-- /.box-header -->
<div class="box-body">
<?php
if ($reptiles) {
?>

<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Имя</th>           
            <th>Диета</th>
            <th>Оптимальная температура</th>
            <th>Среда обитания</th>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach ($reptiles as $reptile) {
                
                echo '<tr>';
                echo '<td><a href="profile-reptile.php?id='.$reptile->pet_id.'">'.$reptile->name.'</a> '. '<a href="add-reptile.php?id='.$reptile->pet_id.'"><i class="fa fa-pencil"></i></a></td>';             
                echo '<td>'.$reptile->diet.'</td>';
                echo '<td>'.$reptile->temperature.'</td>';
                echo '<td>'.$reptile->habitat.'</td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>
<?php } else {
echo 'Ни одного питомца не найдено';
} ?>
</div>
<div class="box-body">
<?php Helper::paginator($count, $page, $size); ?>
</div>
<!-- /.box-body -->
</div>
</div>
</div>
<?php
require_once 'template/footer.php';
?>
