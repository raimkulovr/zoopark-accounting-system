<?php
require_once 'autoload.php';
$id=$_GET['id'];
$header = 'Профиль питомца';
$bird = (new BirdMap())->findBirdProfileById($id);
require_once 'template/header.php';
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <section class="content-header">
            <h1><?=$header?></h1>
            <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Главная</a></li>

            <li><a href="list-birds.php">Список птиц</a></li>

            <li class="active">Профиль питомца</li>
            </ol>
            </section>
            <div class="box-body">

            <a class="btn btn-success" href="add-bird.php?id=<?=$id;?>">Изменить</a>

            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover">
                    <?php require_once '_petProfile.php';?>
                    <tr>
                        <th>Место зимовки</th>
                        <td><?=$bird->country;?></td>
                    </tr>
                    <tr>
                        <th>Дата улета</th>
                        <td><?=$bird->date_out;?></td>
                    </tr>
                    <tr>
                        <th>Дата прилета</th>
                        <td><?=$bird->date_in;?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'template/footer.php';
?>