<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$bird = (new BirdMap())->findById($id);
$birdMap = new BirdMap();

$header = (($id)?'Редактировать данные':'Добавить').' птиц ';
require_once 'template/header.php';
?>

<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-birds.php">Cписок птиц</a></li>
        
        <li class="active"><?=$header;?></li>
    </ol>
</section>

<div class="box-body">

<form action="save-bird.php" method="POST">
    <?php require_once '_formPet.php'; ?>   
    <div class="form-group">
        <label>Место зимовки</label>
        <select class="form-control" name="country_id">
        <?=Helper::printSelectOptions($bird->country_id, $birdMap->arrCountry());?>
        </select>
    </div>
    <div class="form-group">
        <label>Дата отлета</label>
        <input type="date" class="form-control" name="date_out" value="<?=$bird->date_out;?>">
    </div>
    <div class="form-group">
        <label>Дата прилета</label>
        <input type="date" class="form-control" name="date_in" value="<?=$bird->date_in;?>">
    </div>
    <div class="form-group">
        <button type="submit" name="saveBird" class="btn btn-primary">Сохранить</button>
    </div>
</form>
</div>
<?php
require_once 'template/footer.php';
?>