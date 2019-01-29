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
<section id="contact" class="wow fadeInUp">
    <div class="container" id="team" class="wow fadeInUp">
        <div class="row">
            <div class="section-header">
              <a href="./index.php"><i class="fa fa-home"></i> Início</a> / Finalizar Compras         
            </div>                  
        </div>                      
    </div>   
  <div class="container">
    <div class="row">
      <div class="section-header">
        <h2>FINALIZAR COMPRAS</h2> 
        <div class="col-lg-6 col-md-6 col-md-offset-3">
          <table class="table table-bordered text-center" width="100%" style="text-align: center;">
            <thead style="background-color: #e8e8e8">
              <tr>
                <th scope="col" colspan="2">SEU PEDIDO</th>
              </tr>
            </thead>

            <tbody>
            <?php 
                if(isset($_SESSION['carrinho'])){
                $subTotalPedido = 0;
                $read = new read();
                $read->ExeRead('pedidos', 'where id= :id AND id_status = 1', 'id='.$_SESSION['carrinho']);
                foreach($read->getResult() as $pedido){
                  extract($pedido);
                  $_SESSION['valor'] = $valor;
            ?>
              <tr>
                <td><strong>Produto</strong></td>
                <td>
                  <?php
                    $subtotal = 0;
                      $readProdutos = new Read(); 
                      $readProdutos->getProdutoPedido('where p.id_pedido = '.$id);
                      foreach($readProdutos->getResult() as $produtos){
                          extract($produtos);
                    ?>
                    <img class="img-compra" src="<?php echo Url::getBase().'panel/uploud/produto/'.$id_produto.'/'.Validation::getImagesProdutos($id_produto) ?>"/>
                    <?php echo $nome.' x <strong>'.$quantidade.'</strong> <span class="badge">R$ '.number_format($total, 2, ",", "").'</span>' ?>
                    <br/>
                    <?php 
                      $subTotalPedido+=$total;
                      } 
                      ?>              
                </td>
              </tr>
              <tr>
                <td><strong>Subtotal</strong></td>
                <td>R$ <?php  echo number_format($subTotalPedido, 2, ",", "") ?></td>
              </tr>   
              <tr>
                <td><strong>Desconto</strong></td>
                <td><?php echo $id_cupon != null ? Validation::getcupon($id_cupon) : '-' ?></td>
              </tr>            
              <tr>
                <td><strong>Entrega</strong></td>
                <td>    
                <?php echo $entrega ?> dias uteis.            
                </td>
              </tr>
              <tr style="background-color: #e8e8e8">
                <td><strong>Total</strong></td>
                <td>R$ <?php echo number_format($_SESSION['valor'], 2, ",", "") ?></td>
              </tr>
            </tbody>  
            <?php } 
            }?>
          </table>    
          <table class="table table-bordered text-center" width="100%" style="background-color: #e8e8e8;text-align: justify;">
            <tr>
              <td>
                <div class="radio">
                  <label><input type="radio" name="optradio3" checked>Pagamento com o PagSeguro</label>
                </div>                 
              </td>
              <td><img src="https://www.otpanel.com/wp-content/uploads/2016/06/logo-pagseguro.png" width="200"></td>
            </tr>
            <tr>&nbsp;</tr>
            <tr>
              <td colspan="2">
                Os seus dados pessoais serão utilizados para processar a sua compra, apoiar a sua experiência em todo este site e para outros fins descritos na nossa política de privacidade
              </td>
            </tr>
            <tr>
              <td colspan="2">
                 <label class="checkbox-inline"><input type="checkbox" value="">Li e concordo com o(s) termos e condições do site *</label>
              </td>
            </tr>  
          </table>  
            <form id="comprar" action="https://pagseguro.uol.com.br/checkout/v2/payment.html" method="post" onsubmit="PagSeguroLightbox(this); return false;">
              <input type="hidden" name="code" id="code" value="" />
              <button id="finaliza-compra" class="btn btn-default-search-top btn-block" type="submit" style="font-weight: bold;">
                FINALIZAR COMPRA
              </button>   
            </form>                
        </div>                        
      </div>
  </div>  
  <div class="row">
    <div class="col-lg-4 col-md-6">
        
    </div>    
    <div class="col-lg-4 col-md-6" style="text-align: center;">



    </div> 
    <div class="col-lg-4 col-md-6">
        
    </div>          
  </div>

  <div class="container">
    <!-- Uncomment below if you wan to use dynamic maps -->
    <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
  </div>

</section><!-- #contact -->