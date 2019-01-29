<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky">
    <ul class="nav flex-column">
    <?php if($_SESSION['idTipo'] == 1){ ?>
      <li class="nav-item">
        <a class="nav-link active" href="<?php echo Url::getBase();?>">
          <span data-feather="home"></span>
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::getBase();?>categoria">
          <span data-feather="file"></span>
          Categorias
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::getBase();?>produtos">
          <span data-feather="shopping-cart"></span>
          Produtos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::getBase();?>pedidos">
          <span data-feather="briefcase"></span>
          Pedidos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::getBase();?>banner">
          <span data-feather="bar-chart-2"></span>
          Banners
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::getBase();?>cupon">
          <span data-feather="layers"></span>
          Cupons
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::getBase();?>usuarios">
          <span data-feather="users"></span>
          Usuários
        </a>
      </li>
    </ul>

    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
      <span>Ferramentas</span>
      <a class="d-flex align-items-center text-muted" href="#" id="plus">
        <span data-feather="plus-circle"></span>
      </a>
    </h6>
    <ul class="nav flex-column mb-2" id="menu-footer">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::getBase();?>cores">
          <span data-feather="file-text"></span>
          Cores
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::getBase();?>feichos">
          <span data-feather="file-text"></span>
          Feiches
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::getBase();?>tamanhos">
          <span data-feather="file-text"></span>
          Tamanhos
        </a>
      </li>
    <?php }else{ ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::getBase();?>pedidos">
          <span data-feather="briefcase"></span>
          Meus Pedidos
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo Url::getBase();?>../produtos">
          <span data-feather="briefcase"></span>
         Continuar Comprando
        </a>
      </li>
    <?php } ?>
    </ul>
  </div>
</nav>