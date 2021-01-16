<?php
require_once 'autoload.php';
$id = 0;
if (isset($_GET['id'])) {
    $id = Helper::clearInt($_GET['id']);
}
$mammal = (new MammalMap())->findById($id);
$header = (($id)?'Редактировать данные':'Добавить').' питомца ';
require_once 'template/header.php';
?>

<section class="content-header">
    <h1><?=$header;?></h1>
    <ol class="breadcrumb">
        <li><a href="/index.php"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="list-mammal.php">Cписок млекопитающих</a></li>
        <li><a href="profile-mammal.php?id=<?=$id?>">Профиль питомца</a></li>
        <li class="active"><?=$header;?></li>
    </ol>
</section>

<div class="box-body">
<form action="save-mammal.php" method="POST">
    <?php require_once '_formPet.php'; ?>   
    
    <div class="form-group">
        <button type="submit" name="saveMammal" class="btn btn-primary">Сохранить</button>
    </div>
</form>
</div>
<?php
require_once 'template/footer.php';
?>