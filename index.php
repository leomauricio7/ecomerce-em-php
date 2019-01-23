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
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="css/carrousel.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script> 
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
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>
  <!-- Uncomment below if you want to use dynamic Google Maps -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script> -->

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
