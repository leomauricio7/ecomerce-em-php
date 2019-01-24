<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle" id="calendar">
                <span data-feather="calendar" class="datepicker"></span>
                Calendario
              </button>
            </div>
          </div>

         <!-- <canvas class="my-4" id="myChart" width="900" height="380"></canvas>-->
         <div class="row">
          <div class="col">
            <div id="piechart" style="width: 500px; height: 500px;"></div>
          </div>
          <div class="col">
            <div id="columnchart_values" style="width: 500px; height: 300px;"></div>
          </div>
         </div>
          
          <h2>Pedidos</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm" id="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Valor</th>
                  <th>Cliente</th>
                  <th>Situação</th>
                  <th>Data</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $read = new Read(); $read->ExeRead('pedidos');
                foreach($read->getResult() as $pedido):
                    extract($pedido);
                ?>
                <tr>
                  <th scope="row"><?php echo $id; ?></th>
                  <td><?php echo $valor; ?></td>
                  <td><?php echo $id_usuario; ?></td>
                  <td><?php echo $id_situacao; ?></td>
                  <td><?php echo $created; ?></td>
                </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>