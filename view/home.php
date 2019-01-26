<div id="myCarousel" class="carousel slide" data-ride="carousel">

    <!-- controlers do slide -->
    <ol class="carousel-indicators">
        <?php 
        $read = new Read();
        $read->ExeRead('banners');
        $i = 0;
            foreach( $read->getResult() as $banner){
                extract($banner);
        ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $i ?>" class="<?php echo $i == 0 ? 'active': '' ?>"></li>
        <?php $i++; } ?>
    </ol>

    <!-- imagens do caarousel -->
    <div class="carousel-inner">
        <?php 
            $read = new Read();
            $read->ExeRead('banners');
            $j = 0;
                foreach( $read->getResult() as $banner){
                    extract($banner);
        ?>
            <div class="item <?php echo $j == 0 ? 'active': '' ?>">
                <img src="<?php echo Url::getBase().'panel/uploud/banner/'.$id.'/'.$image ?>" alt="Los Angeles" style="width:100%;">
            </div>
        <?php $j++; } ?>
      
    </div>
  </div>

  <section id="team" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Produtos</h2>
        </div>
        <div class="row">
        <?php 
        $read = new Read();
        $read->ExeRead('produtos','ORDER BY id DESC LIMIT 8');
        foreach($read->getResult() as $produtos):
          extract($produtos);
        ?>
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic">
                <img class="image" src="<?php echo Url::getBase().'panel/uploud/produto/'.$id.'/'.Validation::getImagesProdutos($id) ?>" alt="">
                  <div class="middle">
                    <a href="<?php echo Url::getBase().'produto/'.$slug ?>">
                      <div class="text"><i class="fa fa-search"></i></div>
                    </a>
                  </div>
              </div>
              <div class="details">
                <h4><?php echo $nome ?></h4>
                <span>R$ <?php echo number_format($valor, 2, ",", ""); ?></span>
                <div class="carrinho">
                  <?php require_once('functions.php') ?>
                  <form method="post" id="form-<?php echo $id ?>">
                    <input type="hidden" name="idProduto" value="<?php echo $id ?>">
                    <a alt="<?php echo $id ?>" class="plus"><i class="fa fa-cart-plus"></i></a>
                  </form>
                </div>                
              </div>
            </div>
          </div>
        <?php endforeach ?>

        </div>        

      </div>
    </section><!-- #team -->