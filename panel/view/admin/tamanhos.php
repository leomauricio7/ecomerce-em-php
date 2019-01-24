<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tamanhos</li>
  </ol>
</nav>
<div class="row">
    <div class="col">
        <?php
        if ($_POST):
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $tm = new Tamanho();
                $tm->CreateTamanho($dados);

                if (!$tm->getResult()):
                    echo $tm->getMsg();
                else:
                    echo $tm->getMsg();
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
                <label for="exampleInputEmail1">Tamanho</label>
                <input type="text" class="form-control" name="tamanho" placeholder="Tamnho em cm" required autofocus>
                <small id="emailHelp" class="form-text text-muted">Tamanho em cm</small>
            </div><hr>
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Salvar tamanho</button>
        </form>

    </div>
    <div class="col">
        <table class="table" id="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Tamanho</th>
                <th scope="col"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $read = new Read(); $read->ExeRead('tamanhos');
                foreach($read->getResult() as $tamanho):
                    extract($tamanho);
                ?>
                <tr>
                <th scope="row"><?php echo $id; ?></th>
                <td><?php echo $tamanho; ?>cm</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo Url::getBase().'controllers/delete.php?pag=tamanhos&tb=tamanhos&ch=id&value='.$id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>