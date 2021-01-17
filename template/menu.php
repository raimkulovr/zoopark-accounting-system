<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li
      <?=($_SERVER['PHP_SELF']=='/index.php')?'class="active"':'';?>>
      </li>
      <li class="header">Питомцы</li>
      <li <?=($_SERVER['PHP_SELF']=='/list-pets.php')?'class="active"':'';?>>
        <a href="list-pets.php"><i class="fa fa-book"></i><span>Животные и их рацион</span></a>
      </li>
      <li <?=($_SERVER['PHP_SELF']=='/list-mammal.php')?'class="active"':'';?>>
        <a href="list-mammal.php"><i class="fa fa-book"></i><span>Список млекопитающих</span></a>
      </li>
      <li <?=($_SERVER['PHP_SELF']=='/list-birds.php')?'class="active"':'';?>>
        <a href="list-birds.php"><i class="fa fa-book"></i><span>Список птиц</span></a>
      </li>
      <li <?=($_SERVER['PHP_SELF']=='/list-reptiles.php')?'class="active"':'';?>>
        <a href="list-reptiles.php"><i class="fa fa-book"></i><span>Список рептилий</span></a>
      </li>
      

      <li class="header">Сотрудники</li>
      <li <?=($_SERVER['PHP_SELF']=='/list-employee.php')?'class="active"':'';?>>
        <a href="list-employee.php"><i class="fa fa-users"></i><span>Все сотрудники</span></a>
      </li>
      <li <?=($_SERVER['PHP_SELF']=='/list-familyEmployees.php')?'class="active"':'';?>>
        <a href="list-familyEmployees.php"><i class="fa fa-users"></i><span>Семейные пары</span></a>
      </li>
    </ul>
  </section>
</aside>