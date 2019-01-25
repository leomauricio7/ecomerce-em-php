  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="contact-info float-left">
              <i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">contato@brutusstore.com.br</a>
              <i class="fa fa-phone"></i> +55 (084) 99777-7777
            </div>
          </div> 
          <div class="col-lg-3 col-md-6">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Pesquisa produto...">
                  <div class="input-group-btn">
                    <button class="btn btn-default-search-top" type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                </div>
              </form>
          </div> 
          <div class="col-lg-3 col-md-6">
            <div class="social-links float-right">   
            <?php if(isset($_SESSION['logado'])){ ?>
              <a href="<?php echo Url::getBase() ?>panel/" class="twitter"><i class="fa fa-user"></i> <?php echo $_SESSION['user'] ?></a>
            <?php }else{?>
              <a href="<?php echo Url::getBase() ?>login" class="twitter"><i class="fa fa-arrow-right"></i> Entrar</a>
            <?php } ?>
              <a href="<?php echo Url::getBase() ?>carrinho" class="facebook"><span class="badge badge-info"><?php echo Validation::getTotalProdutosCarrinho($_SESSION['carrinho']) ?></span><i class="fa fa-shopping-cart"></i> Carrinho</a>
            </div>
          </div>                               
        </div>        
    </div>
  </section>
 
<!-- mascara para cobrir o site -->  
<div id="mascara"></div>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <!--<h1><a href="#body" class="scrollto">Brutus<span>Store</span></a></h1>-->
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="<?php echo Url::getBase() ?>"><img src="<?php echo Url::getBase() ?>img/logo.png" alt="" title="" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="<?php echo Url::getBase() ?>">Início</a></li>
          <li><a href="<?php echo Url::getBase() ?>sobre">Sobre a Empresa</a></li>        
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              Produtos
            </a>
            <ul class="dropdown-menu">
              <?php
              $read = new Read();
              $read->ExeRead('categorias');
              foreach($read->getResult() as $categoria):
                extract($categoria);
              ?>
              <li>
                <a href="<?php echo url::getBase().'produtos/'.$slug ?>">
                  <img src="<?php echo url::getBase().'panel/uploud/categoria/'.$id.'/'.$image ?>">
                 <?php echo $nome ?>
                </a>
              </li>    
              <?php endforeach ?>
              <li>
                <a href="<?php echo url::getBase().'produtos'?>" style="color: #186548">
                  <img src="<?php echo Url::getBase() ?>img/cat/cat-todos.png">
                  Ver todos
                </a>
              </li>                         
            </ul>
          </li>  
          <li><a href="<?php echo Url::getBase() ?>produtos"><i class="fa fa-shopping-bag"></i> Promoções</a></li>                  
          <li><a href="<?php echo Url::getBase() ?>contato">Contato</a></li>                             
        </ul>             
      </nav><!-- #nav-menu-container -->            
    </div>        
  </header><!-- #header -->
  <!--==========================
    Intro Section
  ============================-->