<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$reptile = (new ReptileMap())->findById($id);
$reptileMap = new ReptileMap();

$header = (($id)?'Редактировать данные':'Добавить').' рептилий ';
require_once 'template/header.php';
?>

<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-reptiles.php">Cписок рептилий</a></li>
        
        <li class="active"><?=$header;?></li>
    </ol>
</section>

<div class="box-body">

<form action="save-reptile.php" method="POST">
    <?php require_once '_formPet.php'; ?>   
    <div class="form-group">
            <label>Оптимальная температура</label>
            <input type="number" class="form-control" name="temperature" required="required" value="<?=$reptile->temperature;?>">
    </div>
    <div class="form-group">
            <label>Время спячки</label>
            <input type="number" class="form-control" name="hibernation_time" value="<?=$reptile->hibernation_time;?>">
        </div>

    <div class="form-group">
        <button type="submit" name="saveReptile" class="btn btn-primary">Сохранить</button>
    </div>
</form>
</div>
<?php
require_once 'template/footer.php';
?>