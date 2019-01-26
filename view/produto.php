<section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Ganhe Cupons Promocionais</h3>
            <p class="cta-text">
              Inscreva-se cadastrando seu e-mail e receba Cupons com Descontos Especiais.
            </p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Our Team Section
    ============================-->    

    <!--==========================
      Contact Section
    ============================-->
    <div class="container" id="team" class="wow fadeInUp">
        <div class="row">
            <div class="section-header">
              <a href="<?php echo Url::getBase() ?>"><i class="fa fa-home"></i> Início</a> / Categoria / Descrição do Produto         
            </div>                  
        </div>                      
    </div>    
    <div class="container">
        <div class="card">
          <div class="container-fliud">
            <div class="wrapper row">
              <!--imagens do produto -->
              <div class="preview col-md-6">
                <div class="preview-pic tab-content">
                <?php
                    $read = new Read();
                    $idProduto = Validation::getIdProduto(Url::getURL(1));
                    $read->ExeRead('images_produto', 'WHERE id_produto = '.$idProduto.'', 'ORDER BY id DESC');
                    $i = 0;
                    foreach($read->getResult() as $images):
                    extract($images);
                  ?>
                    <div class="tab-pane <?php echo $i == 0 ?' active': ''?>" id="pic-<?php echo $i+1?>"><img src="<?php echo Url::getBase().'panel/uploud/produto/'.$idProduto.'/'.$image ?>" width="400" height="252" /></div>
                  <?php $i++;  endforeach ?>
                </div>
                
                <ul class="preview-thumbnail nav nav-tabs">
                <?php
                    $read = new Read();
                    $idProduto = Validation::getIdProduto(Url::getURL(1));
                    $read->ExeRead('images_produto', 'WHERE id_produto = '.$idProduto.'', 'ORDER BY id DESC');
                    $j = 0;
                    foreach($read->getResult() as $images):
                    extract($images);
                  ?>
                    <li class="<?php echo $j == 0 ?' active': ''?>"><a data-target="#pic-<?php echo $j+1?>" data-toggle="tab"><img src="<?php echo Url::getBase().'panel/uploud/produto/'.$idProduto.'/'.$image ?>" /></a></li>
                  <?php $j++;  endforeach ?>
                 
                </ul>
                
              </div>
              <!-- detalhes do produto -->
              <div class="details col-md-6">
              <?php
                  $read_prod = new Read();
                  $read_prod->getProduto('WHERE p.id = '.$idProduto);
                  foreach($read_prod->getResult() as $produto){
                    extract($produto);
                  ?>
                <h3 class="product-title"><?php echo $nomeProduto ?></h3>
                <h5 class="sizes">Cor:
                  <span class="size" data-toggle="tooltip" title="small"><i class="fas fa-circle" style="color: <?php echo $cor ?>"></i></span>
                </h5>

                <p class="product-description"><?php echo $descricao ?></p>

                <h4 class="price">Valor: <span>R$ <?php echo number_format($valor, 2, ",", "") ?></span></h4>
                <h5 class="sizes">Categoria:
                  <span class="size" data-toggle="tooltip" title="small"><?php echo $categoria ?></span>
                </h5>

                <div class="action">
                  <?php require_once('carrinho/init.php') ?>
                    <form method="post" id="form-<?php echo $idProduto ?>">
                      <input type="hidden" name="page" value="">
                      <input type="hidden" name="idProduto" value="<?php echo  $idProduto ?>">
                      <a alt="<?php echo $idProduto ?>" class="plus"><button class="add-to-cart btn btn-default" type="button"><i class="fa fa-cart-plus"></i> ADICIONAR AO CARRINHO</button></a>
                    </form>
                </div>

              </div>
              
            </div>

            <div class="row" style="padding-top: 20px;">
              <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home"><strong>Descrição do Produto</strong></a></li>
                <li><a data-toggle="tab" href="#menu1"><strong>Informações Técnicas</strong></a></li>
              </ul>

              <div class="tab-content">
                <div id="home" class="tab-pane fade in active" style="padding: 20px;">
                  <p><?php echo $descricao ?></p>
                </div>
                <div id="menu1" class="tab-pane fade" style="padding: 20px;">
                  <p>
                  Peso: <?php echo $peso ?>kg
                  Largura: <?php echo $largura ?>cm
                  Comprimento: <?php echo $comprimento ?>cm
                  Altura: <?php echo $altura ?>cm
                  </p>
                </div>
              </div>              
            </div>
            <?php } ?>

          </div>
        </div>
      </div>

  <section id="team" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Produtos Relacionados</h2>
        </div>
        <div class="row">
          <?php
            $read_pr = new Read();
            $idCategory = Validation::getIdCategoriaProduto($idProduto);
            $read_pr->ExeRead('produtos', 'WHERE id <> '.$idProduto.' AND id_categoria = '.$idCategory.' ORDER BY id DESC LIMIT 4');
            foreach($read_pr->getResult() as $pr){
              extract($pr);
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
                <span>R$ <?php echo number_format($valor, 2, ",", "") ?></span>
                <div class="carrinho">
                    <?php require_once('carrinho/init.php') ?>
                    <form method="post" id="form-<?php echo $id ?>">
                      <input type="hidden" name="idProduto" value="<?php echo $id ?>">
                      <a alt="<?php echo $id ?>" class="plus"><i class="fa fa-cart-plus"></i></a>
                    </form>
                </div>                
              </div>
            </div>
          </div>
            <?php } ?>
        </div>              

      </div>
    </section><!-- #team -->      