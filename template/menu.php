<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li
      <?=($_SERVER['PHP_SELF']=='/index.php')?'class="active"':'';?>>

      <a href="index.php"><i class="fa fa-calendar"></i><span>Главная</span></a>

      </li>
      <li class="header">Питомцы</li>
      <li <?=($_SERVER['PHP_SELF']=='/list-pets.php')?'class="active"':'';?>>
        <a href="list-pets.php"><i class="fa fa-users"></i><span>Животные и их рацион</span></a>
      </li>
      <li <?=($_SERVER['PHP_SELF']=='/list-mammal.php')?'class="active"':'';?>>
        <a href="list-mammal.php"><i class="fa fa-users"></i><span>Список млекопитающих</span></a>
      </li>
      <li <?=($_SERVER['PHP_SELF']=='/list-birds.php')?'class="active"':'';?>>
        <a href="list-birds.php"><i class="fa fa-users"></i><span>Список птиц</span></a>
      </li>
      <li <?=($_SERVER['PHP_SELF']=='/list-reptiles.php')?'class="active"':'';?>>
        <a href="list-reptiles.php"><i class="fa fa-users"></i><span>Список рептилий</span></a>
      </li>
      

      <li class="header">Сотрудники</li>
      <li <?=($_SERVER['PHP_SELF']=='#')?'class="active"':'';?>>
        <a href="#"><i class="fa fa-users"></i><span>#</span></a>
      </li>
    </ul>
  </section>
</aside>