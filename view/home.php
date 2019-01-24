    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/intro-carousel/1.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="img/intro-carousel/2.jpg" alt="Chicago" style="width:100%;">
      </div>
      
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
                <span>R$ <?php echo $valor ?></span>
                <div class="carrinho">
                  <a href="<?php echo $id ?>" class="plus"><i class="fa fa-cart-plus"></i></a>
                </div>                
              </div>
            </div>
          </div>
        <?php endforeach ?>

        </div>        

      </div>
    </section><!-- #team -->