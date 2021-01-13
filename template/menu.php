<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
      <li
      <?=($_SERVER['PHP_SELF']=='/index.php')?'class="active"':'';?>>

      <a href="index.php"><i class="fa fa-calendar"></i><span>Главная</span></a>

      </li>
      <li class="header">Питомцы</li>

      <li <?=($_SERVER['PHP_SELF']=='#')?'class="active"':'';?>>
        <a href="#"><i class="fa fa-users"></i><span>#</span></a>
      </li>
      

      

      <li class="header">Сотрудники</li>
      <li <?=($_SERVER['PHP_SELF']=='#')?'class="active"':'';?>>
        <a href="#"><i class="fa fa-users"></i><span>#</span></a>
      </li>
    </ul>
  </section>
</aside>