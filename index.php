<?php 
require_once('./controllers/init.inc');
require_once('./vendor/autoload.php');
if (isset($_GET['logout'])):
  if ($_GET['logout'] == 'confirmar'):
      Validation::deslogar();
  endif;
endif;
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo Url::getBase(); ?>public/image/logo.png">

    <title>Loja Brutus Store</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Url::getBase(); ?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo Url::getBase(); ?>public/css/dashboard.css" rel="stylesheet">
    <!-- fontweasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>

  <body>
  <?php require_once('view/admin/menu-top.php');?>
    <div class="container-fluid">
      <div class="row">
    <?php require_once('view/admin/menu-left.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <?php
              $pagina = Url::getURL(0);
              if($pagina == null){$pagina = 'home';}
              if (file_exists("view/admin/" . $pagina . ".php")):
                  require "view/admin/" . $pagina . ".php";
              else:
                  require "view/admin/404.php";
              endif;
          ?>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo Url::getBase(); ?>public/js/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="<?php echo Url::getBase(); ?>public/js/popper.min.js"></script>
    <script src="<?php echo Url::getBase(); ?>publicjs/bootstrap.min.js"></script>
    <!-- Icons -->
    <script src="<?php echo Url::getBase(); ?>public/js/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="<?php echo Url::getBase(); ?>public/js/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
    <script type="text/javascript">
        var settimmer = 0;
        $(function () {
            window.setInterval(function () {
                var timeCounter = $("b[id=show-time]").html();
                var updateTime = eval(timeCounter) - eval(1);
                $("[id=show-time]").html(updateTime);

                if (updateTime === 0) {
                    window.location = ("<?php echo URL::getBase() . '' . URL::getURL(0); ?>");
                }
            }, 1000);

        });
    </script> 
    <script>
    
      $('#plus').click( () => {
        $('#menu-footer').toggle('slow', () => {});
      });
    
    </script>
  </body>
</html>
