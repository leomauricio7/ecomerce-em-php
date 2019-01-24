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
              <a href="<?php echo Url::getBase(); ?>"><i class="fa fa-home"></i> Início</a> / Minha Conta         
            </div>                  
        </div>                      
    </div>   
  <div class="container"> 
  <div class="row">
    <div class="col-lg-4 col-md-6">
        
    </div>    
    <div class="col-lg-4 col-md-6" style="border:1px solid #e8e8e8;border-radius: 8px;padding-top:15px;background: #e8e8e8">
        <?php
            if (isset($_SESSION['msg'])) {
              echo $_SESSION['msg'];
              unset($_SESSION['msg']);
          }
          if ($_POST) {
              $valida = new Validation();
              $valida->setLogin(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
              $valida->setSenha(filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
              if ($valida->logar()) {
                if($_SESSION['idTipo'] == 2){
                  echo '<script>window.history.go(-2);</script>';
                }else{
                  echo '<script>window.location.href="panel/";</script>';
                }
              } else {
                  echo '<script>window.history.go(-1);</script>';
              }

          }
        ?>
        <table class="table" width="100%">
          <thead>
            <tr>
              <th scope="col" style="text-align: center;font-size: 18px">INSIRA SEUS DADOS</th>
            </tr>
          </thead>
          <tbody>
          <form method="post" action="">
            <tr>
              <td>
                <div class="form-group">
                  <label for="pwd">E-mail *:</label>
                  <input type="email" class="form-control" name="email" id="pwd" required>
                </div>                 
              </td>
            </tr>

            <tr>
              <td>
                <div class="form-group">
                  <label for="pwd">Senha *:</label>
                  <input type="password" class="form-control" name="senha" id="pwd" required>
                </div>                  
              </td>
            </tr>

            <tr>
              <td align="center">
                <a href="">  
                <button class="btn btn-default-search-top" type="submit" style="font-weight: bold;">
                  Acessar
                </button> 
                </a>                 
              </td>
            </tr>
            </form>
            <tr>
              <td>
                <a href="<?php echo Url::getBase() ?>senha-perdida">Perdeu sua senha?</a>
              </td>
            </tr>
            <tr>
              <td>
                <a href="<?php echo Url::getBase() ?>cadastro">Não possui cadastro? cadastre-se aqui!</a>
              </td>
            </tr>
          </tbody>  
        </table>              
    </div> 
    <div class="col-lg-4 col-md-6">
        
    </div>          
  </div>

  <div class="container">
    <!-- Uncomment below if you wan to use dynamic maps -->
    <!--<div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>-->
  </div>

</section><!-- #contact -->