<?php
require_once 'autoload.php';
$id=$_GET['id'];
$header = 'Профиль питомца';
$reptile = (new ReptileMap())->findReptileProfileById($id);
require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
            <h1><?=$header?></h1>
            <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-reptiles.php">Список рептилий</a></li>

            <li class="active">Профиль питомца</li>
            </ol>
            </section>
            <div class="box-body">

            <a class="btn btn-success" href="add-reptile.php?id=<?=$id;?>">Изменить</a>

            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <?php require_once '_petProfile.php';?>
                    <tr>
                        <th>Оптимальная температура</th>
                        <td><?=$reptile->temperature;?></td>
                    </tr>
                    <tr>
                        <th>Время спячки</th>
                        <td><?=!empty($reptile->hibernation_time)? $reptile->hibernation_time: "Отсутствует" ?></td>
                    </tr>
                   
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>