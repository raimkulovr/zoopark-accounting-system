<?php
require_once 'autoload.php';
$id=$_GET['id'];
$header = 'Профиль питомца';

require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
            <h1><?=$header?></h1>
            <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-mammal.php">Список млекопитающих</a></li>

            <li class="active">Профиль питомца</li>
            </ol>
            </section>
            <div class="box-body">

            <a class="btn btn-success" href="add-mammal.php?id=<?=$id;?>">Изменить</a>

            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <?php require_once '_petProfile.php';?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>