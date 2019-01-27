<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pedidos</li>
  </ol>
</nav>
<div class="row">
    <div class="col">
        <table class="table" id="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Valor</th>
                <th scope="col">Usuário</th>
                <th scope="col">Situacao</th>
                <th scope="col">Created</th>
                <th scope="col"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $read = new Read(); $read->getPedido('where p.id_usuario = '.$_SESSION['idUser']);
                foreach($read->getResult() as $pedido):
                    extract($pedido);
                ?>
                <tr>
                <th scope="row"><?php echo $id; ?></th>
                <td><?php echo $valor; ?></td>
                <td><?php echo $usuario; ?></td>
                <td><?php echo $status; ?></td>
                <td><?php echo $data; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo Url::getBase().'controllers/delete.php?pag=pedidos&tb=pedidos&ch=id&value='.$id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>