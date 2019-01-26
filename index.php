<?php 
require_once('./panel/controllers/init.inc');
require_once('./panel/vendor/autoload.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Brutus Store</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->


  <!-- Libraries CSS Files -->
  <link href="<?php echo Url::getBase(); ?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo Url::getBase(); ?>lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo Url::getBase(); ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo Url::getBase(); ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo Url::getBase(); ?>lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="<?php echo Url::getBase(); ?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo Url::getBase(); ?>css/carrousel.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo Url::getBase(); ?>css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo Url::getBase(); ?>lib/bootstrap/bootstrap.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <style type="text/css">
    .float-left {
      float: left!important;
      padding: 8px 0;
    }
    .float-right {
      float: right!important;
      padding: 8px 0;
    }
    .btn-default-search-top {
    color: #fff;
    background-color: #186548;
    /* border-color: #ccc; */
    }    
    .image {
      opacity: 1;
      display: block;
      width: 100%;
      height: auto;
      transition: .5s ease;
      backface-visibility: hidden;
    }

    .middle {
      transition: .5s ease;
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }

    .pic:hover .image {
      opacity: 0.3;
      cursor: pointer;
    }

    .pic:hover .middle {
      opacity: 1;
      cursor: pointer;
    }

    .text {
      background-color: #196448;
      color: white;
      font-size: 12px;
      padding: 12px 24px;
    }    
    .text a{
      color: #fff;
    }
  </style>
</head>

<body id="body">
  <!--==========================
    Top Bar
  ============================-->
  <?php include_once "./view/header.php"; ?>
  
  <main id="main">
    <?php
          $pagina = Url::getURL(0);
          if($pagina == null){$pagina = 'home';}
          if (file_exists("view/" . $pagina . ".php")):
              require "view/" . $pagina . ".php";
          else:
              require "view/404.php";
          endif;                             
    ?>    
    <section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-center text-lg-left">
            <p class="cta-text">
              Inscreva-se cadastrando seu e-mail e receba <strong>Cupons Promocionais</strong> com Descontos Especiais.
            </p>
          </div>
          <div class="col-lg-6 text-center">
            <div class="form">
              <form>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Informe seu E-mail!">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="fa fa-arrow-right"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>            
          </div>
        </div>
      </div>
    </section><!-- #call-to-action -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <?php include_once "./view/footer.php"; ?>

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="<?php echo Url::getBase(); ?>lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo Url::getBase(); ?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo Url::getBase(); ?>lib/easing/easing.min.js"></script>
  <script src="<?php echo Url::getBase(); ?>lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo Url::getBase(); ?>lib/superfish/superfish.min.js"></script>
  <script src="<?php echo Url::getBase(); ?>lib/wow/wow.min.js"></script>
  <script src="<?php echo Url::getBase(); ?>lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo Url::getBase(); ?>lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="<?php echo Url::getBase(); ?>lib/sticky/sticky.js"></script>
  <!-- Uncomment below if you want to use dynamic Google Maps -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script> -->

  <!-- Contact Form JavaScript File -->
  <script src="<?php echo Url::getBase(); ?>contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo Url::getBase(); ?>js/main.js"></script>
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <!--api cep-->
  <script type="text/javascript" src="<?php echo Url::getBase(); ?>panel/public/js/busca_cep.js"></script>
  <!--paginate -->
  <!--<script src="<?php echo url::getBase() ?>js/paginate.js"></script>-->
  <script>
  $(function(){
    $('.plus').click(function(){
      var idForm = $(this).attr('alt');
      $('#form-'+idForm).submit();
    });
  })
  </script>
  <script>
    $(document).ready(function() {
        //Pegamos o valor selecionado default no select id="qtd"
         var mostrar_por_pagina = 2; 
        //quantidade de divs
          var numero_de_itens = $('#conteudo').children('.col-lg-4').length;
         //fazemos uma calculo simples para saber quantas paginas existiram
          var numero_de_paginas = Math.ceil(numero_de_itens / mostrar_por_pagina)
        //Colocamos a div class controls dentro da div id pagi
        $('#pagi').append('<div class=controls></div><input id=current_page type=hidden><input id=mostrar_por_pagina type=hidden>');
          $('#current_page').val(0);
          $('#mostrar_por_pagina').val(mostrar_por_pagina);
          //Criamos os links de navegação
          var nevagacao = '<li><a class="prev" onclick="anterior()">Prev</a></li>';
          var link_atual = 0;
          while (numero_de_paginas > link_atual) {
              nevagacao += '<li><a class="page" onclick="ir_para_pagina('+link_atual+')" longdesc="'+link_atual+'">'+(link_atual + 1)+'</a></li>';
              link_atual++;
          }
          nevagacao += '<li><a class="proxima" onclick="proxima()">proxima</a></li>';
          //colocamos a nevegação dentro da div class controls
          $('.controls').html("<div class='paginacao'>\
            <ul class='pagination pagination-sm'>"+nevagacao+"</ul></div>");
          //atribuimos ao primeiro link a class active
          $('.controls .page:first').addClass('active');
          $('#conteudo').children().css('display', 'none');
          $('#conteudo').children().slice(0, mostrar_por_pagina).css('display', 'block');
      });
    </script>
    <script type="text/javascript">
      function ir_para_pagina(numero_da_pagina) {
            //Pegamos o número de itens definidos que seria exibido por página
            var mostrar_por_pagina = parseInt($('#mostrar_por_pagina').val(), 0);
            //pegamos  o número de elementos por onde começar a fatia
            inicia = numero_da_pagina * mostrar_por_pagina;
            //o número do elemento onde terminar a fatia
            end_on = inicia + mostrar_por_pagina;
            $('#conteudo').children().css('display', 'none').slice(inicia, end_on).css('display', 'block');
            $('.page[longdesc=' + numero_da_pagina+ ']').addClass('active')
              .siblings('.active').removeClass('active');
          $('#current_page').val(numero_da_pagina);
        }
      
        function anterior() {
            nova_pagina = parseInt($('#current_page').val(), 0) - 1;
            //se houver um item antes do link ativo atual executar a função
            if ($('.active').prev('.page').length == true) {
                ir_para_pagina(nova_pagina);
            }
        }
      
      function proxima() {
            nova_pagina = parseInt($('#current_page').val(), 0) + 1;
            //se houver um item após o link ativo atual executar a função
            if ($('.active').next('.page').length == true) {
                ir_para_pagina(nova_pagina);
            }
        }
    </script>
    <script type="text/javascript">
    // Pegamos o evento change do select id="qtd" e remontamos toda a paginação default
      $( "#qtd" ).change(function() {
        //Removemos os "controles" de paginação
          $(".controls").remove();
        //Pegamos o valor selecionado
          var mostrar_por_pagina = this.value;
          //remontamos a paginação
          var numero_de_itens = $('#conteudo').children('.col-lg-4').length;
          var numero_de_paginas = Math.ceil(numero_de_itens / mostrar_por_pagina);
          //Colocamos a div class controls dentro da div id pagi
        $('#pagi').append('<div class=controls></div><input id=current_page type=hidden><input id=mostrar_por_pagina type=hidden>');
          $('#current_page').val(0);
          $('#mostrar_por_pagina').val(mostrar_por_pagina);
      //Criamos os links de navegação
          var nevagacao = '<li><a class="prev" onclick="previous()">Prev</a></li>';
          var link_atual = 0;
          while (numero_de_paginas > link_atual) {
              nevagacao += '<li><a class="page" onclick="ir_para_pagina(' + link_atual + ')" longdesc="' 
              + link_atual + '">' + (link_atual + 1) + '</a></li>';
              link_atual++;
          }
          nevagacao += '<li><a class="next" onclick="next()">Next</a></li>';
        //colocamos a navegação dentro da div class controls
          $('.controls').html("<div class='paginacao'><ul class='pagination pagination-sm'>"+nevagacao+"</ul></div>");
          $('.controls .page:first').addClass('active');
          $('#conteudo').children().css('display', 'none');
          $('#conteudo').children().slice(0, mostrar_por_pagina).css('display', 'block');
        
      });
    </script>
    <script>
    $(function(){
      $('#add-produto').click(function(e){
          e.preventDefault();
          var data = $(this).attr('alt');
          var dados = data.split(';');
          var id_produto_pedido = dados[0]; var qtd = dados[1];
          $.ajax({
              url: "view/add.php",
              type: "POST",
              data: "id_produto_pedido="+id_produto_pedido+"&qtd="+qtd,
              dataType: "json"

          }).done(function(resposta) {
              console.log(resposta);

          }).fail(function(jqXHR, textStatus ) {
              console.log("Request failed: " + textStatus);

          }).always(function() {
              console.log("completou");
              location.reload();
          });
      });
      $('#del-produto').click(function(e){
        e.preventDefault();
          var data = $(this).attr('alt');
          var dados = data.split(';');
          var id_produto_pedido = dados[0]; var qtd = dados[1];
          $.ajax({
              url: "view/del.php",
              type: "POST",
              data: "id_produto_pedido="+id_produto_pedido+"&qtd="+qtd,
              dataType: "json"

          }).done(function(resposta) {
              console.log(resposta);

          }).fail(function(jqXHR, textStatus ) {
              console.log("Request failed: " + textStatus);

          }).always(function() {
              console.log("completou");
              location.reload();
          });
      });
    });
    </script>
</body>
</html>
