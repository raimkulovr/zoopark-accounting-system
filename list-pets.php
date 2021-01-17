<?php
require_once 'autoload.php';
$size=10;
$page=1;
$petMap = new PetMap();
$count = $petMap->count();
$pets = $petMap->findAll($page*$size-$size, $size);
$header = 'Перечень всех животных на текущую дату и номера их рационов.';
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

</div>
<!-- /.box-header -->
<div class="box-body">
<?php
if ($pets) {
?>

<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Имя</th>
            
            <th>Диета</th>
            <th>Среда обитания</th>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach ($pets as $pet) {
                
                echo '<tr>';
                echo '<td>'.$pet->name.'</td>';
                
                
                echo '<td>'.$pet->diet.'</td>';
                echo '<td>'.$pet->habitat.'</td>';
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
