<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cores</li>
  </ol>
</nav>
<div class="row">
    <div class="col">
        <?php
        if ($_POST):
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $cor = new Cor();
                $cor->CreateCor($dados);

                if (!$cor->getResult()):
                    echo $cor->getMsg();
                else:
                    echo $cor->getMsg();
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
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome" required autofocus>
                <small id="emailHelp" class="form-text text-muted">Nome da cor</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Cor</label>
                <input type="color" class="form-control" name="cor" required>
                <small id="emailHelp" class="form-text text-muted">Selecione a cor</small>
            </div><hr>
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Salvar cor</button>
        </form>

    </div>
    <div class="col">
        <table class="table" id="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Cor</th>
                <th scope="col"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $read = new Read(); $read->ExeRead('cores');
                foreach($read->getResult() as $cor):
                    extract($cor);
                ?>
                <tr>
                <th scope="row"><?php echo $id; ?></th>
                <td><?php echo $nome; ?></td>
                <td><span class="border border-with" style="background-color: <?php echo $cor; ?>"><?php echo $cor; ?></span></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo Url::getBase().'controllers/delete.php?pag=cores&tb=cores&ch=id&value='.$id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>