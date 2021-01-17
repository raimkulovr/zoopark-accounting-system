<?php
require_once 'autoload.php';
$size=10;
$page=1;
$employeeMap = new EmployeeMap();
$count = $employeeMap->count();
$employees = $employeeMap->findAll($page*$size-$size, $size);
$header = 'Перечень всех сотрудников';
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
if ($employees) {
?>

<table id="example2" class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Имя</th>
            <th>Номер</th>
            <th>День рождения</th>
        </tr>
    </thead>

    <tbody>
        <?php
            foreach ($employees as $employee) {
                
                echo '<tr>';
                echo '<td>'.$employee->firstname.' '. $employee->lastname.'</td>';
                
                
                echo '<td>'.$employee->phone.'</td>';
                echo '<td>'.$employee->birthday.'</td>';
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
