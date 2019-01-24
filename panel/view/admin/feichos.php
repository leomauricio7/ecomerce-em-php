<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Feichos</li>
  </ol>
</nav>
<div class="row">
    <div class="col">
        <?php
        if ($_POST):
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $feichos = new Feicho();
                $feichos->CreateFeicho($dados);

                if (!$feichos->getResult()):
                    echo $feichos->getMsg();
                else:
                    echo $feichos->getMsg();
                    unset($dados);
                endif;
            endif;
            if (!empty($_SESSION['msg'])):
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            endif;
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Feicho</label>
                <input type="text" class="form-control" name="nome" placeholder="Feixo..." required autofocus>
                <small id="emailHelp" class="form-text text-muted">Feixo</small>
            </div><hr>
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Salvar Feicho</button>
        </form>

    </div>
    <div class="col">
        <table class="table" id="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Feixo</th>
                <th scope="col"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $read = new Read(); $read->ExeRead('feichos');
                foreach($read->getResult() as $feicho):
                    extract($feicho);
                ?>
                <tr>
                <th scope="row"><?php echo $id; ?></th>
                <td><?php echo $nome; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo Url::getBase().'controllers/delete.php?pag=feichos&tb=feichos&ch=id&value='.$id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>