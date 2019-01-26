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
<!-- Spiner -->
<div class="loading" id="loading" style="display:none">Loading&#8230;</div>

<!--==========================
  Contact Section
============================-->
<section id="contact" class="wow fadeInUp">
    <div class="container" id="team" class="wow fadeInUp">
        <div class="row">
            <div class="section-header">
              <a href="./index.php"><i class="fa fa-home"></i> Início</a> / Carrinho         
            </div>                  
        </div>                      
    </div>   
  <div class="container">
    <div class="row">
      <div class="section-header">
        <h2>CARRINHO DE COMPRAS</h2>
        <p>Lista de produtos adicionados</p>   
        <?php if(isset($_SESSION['msg'])){ echo $_SESSION['msg']; unset($_SESSION['msg']); } ?>     
        <table class="table table-bordered text-center">
          <thead style="background-color: #e8e8e8">
            <tr>
              <th scope="col"></th>
              <th scope="col">Produto</th>
              <th scope="col">Preço</th>
              <th scope="col">Quantidade</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(isset($_SESSION['carrinho'])){
            $subTotal = 0;
            $read = new read();
            $cupon = null;
            $readProdutos = new read();
            $read->ExeRead('pedidos', 'where id= :id AND id_status = 4', 'id='.$_SESSION['carrinho']);
            foreach($read->getResult() as $pedido){ 
              $pedido['id'];
              $cupon =  $pedido['id_cupon'];
              $readProdutos->getProdutoPedido('where p.id_pedido = '.$pedido['id']);
              foreach($readProdutos->getResult() as $produtos){
                  extract($produtos);
            ?>
            <tr>
              <th scope="row" style="text-align: center;">
                <a href="<?php echo Url::getBase().'panel/controllers/delete.php?pag=../carrinho&tb=produtos_pedido&ch=id&value='.$id_produto_pedido?>"><i class="fa fa-trash"></i></a>
              </th>
              <td><img src="<?php echo Url::getBase().'panel/uploud/produto/'.$id_produto.'/'.Validation::getImagesProdutos($id_produto) ?>" width="200" /></td>
              <td>R$ <?php echo number_format($valor, 2, ",", "") ?></td>
              <td>
                <form>
                  <a href="" id="del-produto" alt="<?php echo $id_produto_pedido.';'.$quantidade ?>"><i class="fa fa-minus"></i></a>
                  <span class="badge"><?php echo $quantidade ?></span>
                  <a href="" id="add-produto" alt="<?php echo $id_produto_pedido.';'.$quantidade ?>"><i class="fa fa-plus"></i></a>
                </form>                
              </td>
              <td>R$ <?php echo number_format($total, 2, ",", "") ?></td>
            </tr>
                 
            <?php
              $subTotal+= $total;
              } 
            }
          ?>
            <tr>
              <th scope="row"></th>
              <td colspan="2">
                <form method="post" id="form-cupon">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="CUPOM DE DESCONTO" name="cupon" required>
                    <input type="hidden" name="subTotalPedido" value="<?php echo $subTotal ?>">
                    <input type="hidden" name="id_pedido" value="<?php echo $_SESSION['carrinho'] ?>">
                    <div class="input-group-btn">
                      <button id="checkCupon" class="btn btn-default-search-top" type="submit" style="font-weight: bold;">
                        APLICAR DESCONTO
                      </button>
                    </div>
                  </div>
                </form>              
              </td>
              <td><img src="http://www.fundecto.com.br/images/desconto.png" width="20"/> <strong>DESCONTO</strong></td>
              <td><span><?php echo $cupon != '' ? Validation::getcupon($cupon) : '-' ?></span></td>
            </tr>
          </tbody>
          <?php } ?>
        </table>      
      </div>
  </div>  
  <div class="row">
    <div class="col-lg-4 col-md-6">
        
    </div>  
    <?php if(isset($_SESSION['carrinho'])) {?>  
    <?php $subTotal = $cupon != null ? Validation::getSubTotal($cupon, $subTotal) : $subTotal; ?>
    <div class="col-lg-4 col-md-6" style="text-align: center;">
        <table class="table table-bordered text-center" width="100%">
          <thead>
            <tr>
              <th scope="col" colspan="2">TOTAL NO CARRINHO</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><strong>Subtotal</strong></td>
              <td>R$ <span id="tolta-com-desconto"><?php echo number_format($subTotal, 2, ",", "") ?></sapan></td>
            </tr>
            <tr>
              <td><img src="https://ap.imagensbrasil.org/images/caminhao_entrega.png" width="50"></td>
              <td>
                <a id="frete" style="cursor: pointer;"><i class="fa fa-car"></i> Calcular Frete</a><br>
                <span id="valor_frete"></span>
                <form method="POST" id="form-frete" action="" style="display:none;">
                    <input type="hidden" id="subtotal" name="valor" value="<?php echo number_format($subTotal) ?>">
                    <input type="hidden" name="pedido_id" value="<?php echo $_SESSION['carrinho'] ?>">
                    <div class="form-group">
                        <input type="radio" name="tipo_frete" value="41106" required>PAC
                        <input type="radio" name="tipo_frete" value="40010" required>SEDEX
                    </div>
                    <div class="input-group input-group-sm" style="width: 100%">
                      <input type="text" name="cep" placeholder="informe um cep" class="form-control" maxlength="8" minlength="8" required autofocus>
                      <span class="input-group-btn">
                        <button class="btn btn-default-search-top btn-sm" type="submit" id="calculaFrete">calcular</button>
                      </span>
                  </div>
                </form>
              </td>

            </tr>
            <tr>
              <td><strong>Entrega</strong></td>
              <td><span id="dias">-</span></td>
            </tr>
            <tr>
              <td><strong>Total</strong></td>
              <td><span id="total">-</span></td>
            </tr>
          </tbody>  
        </table> 
        <a href="">  
        <button class="btn btn-default-search-top" type="submit" style="font-weight: bold;">
          FINALIZAR PEDIDO
        </button> 
        </a>              
    </div> 
    <?php } ?>
    <div class="col-lg-4 col-md-6">
        
    </div>          
  </div>

  <div class="container">
    <!-- Uncomment below if you wan to use dynamic maps -->
    <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
  </div>

</section><!-- #contact -->