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
              <a href="<?php echo Url::getBase(); ?>"><i class="fa fa-home"></i> Início</a> / Cadastro de usíarios         
            </div>                  
        </div>                      
    </div>   
  <div class="container">
    <div class="row">
      <div class="section-header">
      <?php
        if ($_POST):
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $dados['type'] = 2;
                $user = new User();
                $user->CreateUser($dados);

                if (!$user->getResult()):
                    echo $user->getMsg();
                else:
                    echo $user->getMsg();
                    unset($dados);
                endif;
                unset($dados);
            endif;
            if (!empty($_SESSION['msg'])):
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            endif;
        ?>
        <h2>CADASTRO DE USUÁRIO</h2>
        <p>Preencha os campos abaixo para finalizar seu cadastro.</p>  
        <div class="col-lg-12 col-md-12">
        <form method="post" action="">
          <div class="form-group col-md-8">
            <label for="usr">Nome Completo:</label>
            <input type="text" name="nome" class="form-control" id="usr" required>
          </div>
          <div class="form-group col-md-4">
            <label for="usr">CPF:</label>
            <input type="text" class="form-control" name="cpf" id="cpf" maxlength="11" required>
          </div>
          <div class="form-group col-md-3">
            <label for="pwd">CEP:</label>
            <div class="input-group">
              <input type="text" class="form-control" name="cep" id="cep" maxlength="8" placeholder="Informe o CEP" required>
              <div class="input-group-btn">
                <button class="btn btn-default" type="submit">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </div>   
          <div class="form-group col-md-5">
            <label for="pwd">Rua:</label>
            <input type="text" class="form-control" id="rua" name="rua" required>
          </div>  
          <div class="form-group col-md-4">
            <label for="pwd">Bairro:</label>
            <input type="text" class="form-control" id="bairro" name="bairro" required>
          </div> 
          <div class="form-group col-md-2">
            <label for="pwd">Número:</label>
            <input type="number" class="form-control" id="numero" name="numero" required>
          </div>    
          <div class="form-group col-md-6">
            <label for="pwd">Cidade:</label>
            <input type="text" class="form-control" name="cidade" id="cidade" required>
          </div>   
          <div class="form-group col-md-2">
            <label for="pwd">Estado:</label>
            <input type="text" class="form-control" name="uf" id="uf" maxlength="2" required>
          </div>    
          <div class="form-group col-md-2">
            <label for="pwd">Telefone:</label>
            <input type="text" class="form-control" name="telefone" required>
          </div>   
          <div class="form-group col-md-8">
            <label for="pwd">E-mail:</label>
            <input type="text" name="email" class="form-control" required>
          </div>   
          <div class="form-group col-md-4">
            <label for="pwd">Senha:</label>
            <input type="password" name="senha" class="form-control" required>
          </div>                                                                               

          <button class="btn btn-default-search-top" type="submit" style="font-weight: bold;">
            Finalizar Cadastro
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