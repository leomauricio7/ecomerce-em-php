<?php
require_once('./controllers/init.inc');
require_once('./vendor/autoload.php');

Validation::validaSession();
if (isset($_GET['logout'])):
  if ($_GET['logout'] == 'true'):
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
    <!--Datatable-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
  </head>

  <body>
  <?php require_once('view/admin/menu-top.php');?>
    <div class="container-fluid">
      <div class="row">
    <?php require_once('view/admin/menu-left.php'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <?php
            if($_SESSION['idTipo'] == 1){
              $pagina = Url::getURL(0);
              if($pagina == null){$pagina = 'home';}
              if (file_exists("view/admin/" . $pagina . ".php")):
                  require "view/admin/" . $pagina . ".php";
              else:
                  require "view/admin/404.php";
              endif;
            }else{
              require "view/admin/pedidos.php";
            }
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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- Icons -->
    <script src="<?php echo Url::getBase(); ?>public/js/feather.min.js"></script>
    <!--JqueryToSlug-->
    <script src="<?php echo Url::getBase(); ?>public/js/jquery.stringToSlug.js"></script>
    <script src="<?php echo Url::getBase(); ?>public/js/jquery.stringToSlug.min.js"></script>
    <!--datatable-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
    <!--google charts-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="<?php echo Url::getBase(); ?>public/charts/graficos.js"></script>
    <!-- datePicked-->
    <script type="text/javascript" src="<?php echo Url::getBase(); ?>public/js/picker.js"></script>
    <script type="text/javascript" src="<?php echo Url::getBase(); ?>public/js/picker.date.js"></script>
    <script type="text/javascript" src="<?php echo Url::getBase(); ?>public/js/picker.time.js"></script>
    <!--api cep-->
    <script type="text/javascript" src="<?php echo Url::getBase(); ?>public/js/busca_cep.js"></script>
    <!-- gerador de senha -->
    <script type="text/javascript" src="<?php echo Url::getBase(); ?>public/js/gerador_de_senha.js"></script>
    <script>
      $('#geraSenha').click(function(){
        $('#senha').val(generatePassword(8));
      });
      $('#calendar').click(function(){
        //$('.datepicker').pickadate()
      })
     
    </script>
    <script>
      feather.replace()
    </script>
    <script>
    $(document).ready(function(){
      $('table').dataTable({
        paginate: true,
        scrollY: 300,
        "language": {
              "sEmptyTable": "Nenhum registro encontrado",
              "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
              "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
              "sInfoFiltered": "(Filtrados de _MAX_ registros)",
              "sInfoPostFix": "",
              "sInfoThousands": ".",
              "sLengthMenu": "_MENU_ resultados por página",
              "sLoadingRecords": "Carregando...",
              "sProcessing": "Processando...",
              "sZeroRecords": "Nenhum registro encontrado",
              "sSearch": "Pesquisar",
              "oPaginate": {
                  "sNext": "Próximo",
                  "sPrevious": "Anterior",
                  "sFirst": "Primeiro",
                  "sLast": "Último"
              },
              "oAria": {
                  "sSortAscending": ": Ordenar colunas de forma ascendente",
                  "sSortDescending": ": Ordenar colunas de forma descendente"
              }
          }
        });
    });
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
    <script>
      $("#text").stringToSlug({
        setEvents: 'keyup keydown blur',
        getPut: '#slug',
        space: '-'
      });
    </script>
    <script>
      $(document).ready(function(){
        $('#cor').hide('fast');
        $('#tamanho').hide('fast');
        $('#feiche').hide('fast');
      });
      var categoria = $('#categoria');
          categoria.change(function () {
           if(categoria.val() == 17){
            $('#cor').show('slow');
            $('#tamanho').show('slow');
            $('#feiche').show('slow');
           }else{
            $('#cor').hide('fast');
            $('#tamanho').hide('fast');
            $('#feiche').hide('fast');
           }
      });
    </script>
  </body>
</html>
