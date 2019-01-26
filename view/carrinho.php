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
              <a href="./index.php"><i class="fa fa-home"></i> Início</a> / Carrinho         
            </div>                  
        </div>                      
    </div>   
  <div class="container">
    <div class="row">
      <div class="section-header">
        <h2>CARRINHO DE COMPRAS</h2>
        <p>Lista de produtos adicionados</p>            
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
            $readProdutos = new read();
            $read->ExeRead('pedidos', 'where id= :id AND id_status = 4', 'id='.$_SESSION['carrinho']);
            foreach($read->getResult() as $pedido){ 
              $pedido['id'];
              $readProdutos->getProdutoPedido('where p.id_pedido = '.$pedido['id']);
              foreach($readProdutos->getResult() as $produtos){
                  extract($produtos);
            ?>
            <tr>
              <th scope="row" style="text-align: center;">
                <a href="<?php echo Url::getBase().'panel/controllers/delete.php?pag=../carrinho&tb=produtos_pedido&ch=id&value='.$id_produto_pedido?>"><i class="fa fa-trash-o"></i></a>
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
              <td colspan="3">
                <form>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="CUPOM DE DESCONTO">
                    <div class="input-group-btn">
                      <button class="btn btn-default-search-top" type="submit" style="font-weight: bold;">
                        APLICAR DESCONTO
                      </button>
                    </div>
                  </div>
                </form>              
              </td>
              <td><button type="button" class="btn disabled">Atualizar carrinho</button></td>
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
              <td>R$ <?php echo number_format($subTotal, 2, ",", "") ?></td>
            </tr>
            <tr>
              <td><strong>Entrega</strong></td>
              <td><a href="#"><i class="fa fa-car"></i> Calcular Entrega</a></td>
            </tr>
            <tr>
              <td><strong>Total</strong></td>
              <td>R$ 180,00</td>
            </tr>
          </tbody>  
        </table> 
        <a href="./index?p=finalizar-compras">  
        <button class="btn btn-default-search-top" type="submit" style="font-weight: bold;">
          FINALIZAR A COMPRA
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