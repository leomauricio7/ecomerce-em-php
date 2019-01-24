<nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="<?php echo Url::getBase();?>"><img src="<?php echo Url::getBase(); ?>public/image/logo.png"/></a>
    <h1 class="text-md-right"><i class="fa fa-user"></i> <?php echo $_SESSION['user'] ?></h1>
    
    <ul class="navbar-nav px-3">
    
    <li class="nav-item text-nowrap">
        <a class="nav-link" href="?logout=true">Sair <i class="fa fa-sign-in-alt"></i></a>
    </li>
    </ul>
</nav>