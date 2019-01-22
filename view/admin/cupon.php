<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cupons</li>
  </ol>
</nav>
<div class="row">
    <div class="col">
    <?php if(Url::getURL(1) == ''){ ?>
    <!-- cadastro de categoria-->
        <?php
        if ($_POST):
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $cupon = new Cupon();
                $cupon->CreateCupon($dados);

                if (!$cupon->getResult()):
                    echo $cupon->getMsg();
                else:
                    echo $cupon->getMsg();
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
                <input type="text" class="form-control" name="nome" aria-describedby="emailHelp" placeholder="Nome" required autofocus>
                <small id="emailHelp" class="form-text text-muted">Nome do cupon</small>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Desconto</label>
                <input type="text" class="form-control" maxlength="6" name="desconto" placeholder="R$ 0.00" required>
                <small class="form-text text-muted">Valor do desconto</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Validade</label>
                <input type="date" class="form-control" name="validade" placeholder="" required>
            </div><hr>
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Finalizar Cadastro</button>
        </form>
        <?php }else{ ?>
        <!--edição de categoria-->
            <?php
            $id = Url::getURL(1);
            if ($_POST):
          
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    $update = new Update();

                    $dados = ['nome' => $dados['nome'], 'desconto' => $dados['desconto'], 'validade' => $dados['validade']];
                    $update->ExeUpdate('cupons', $dados, 'WHERE id = :id', 'id=' . $id . '');
    
                    if ($update->getResult()): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa fa-check-circle"></i> <?php if ($update->getRowCount() === 0): echo 'Nenhuma';
                        else: echo $update->getRowCount();
                        endif ?> alteração realizada. Aguarde... redirecionando em <b id="show-time">2</b> segundos.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true" style="cursor: pointer;">&times;</span>
                            </button>
                        </div>
                    <?php
                        unset($Dados);
                    endif;
                endif;

                $read = new Read();
                $read->ExeRead('cupons','where id = :id', 'id='.$id);
                foreach($read->getResult() as $cupon):
                    extract($cupon);
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" name="nome" aria-describedby="emailHelp" placeholder="Nome"  value="<?php echo $nome ?>"required autofocus>
                    <small id="emailHelp" class="form-text text-muted">Nome do cupon</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Desconto</label>
                    <input type="text" class="form-control" maxlength="6" name="desconto" placeholder="R$ 0.00"  value="<?php echo $desconto ?>"  required>
                    <small class="form-text text-muted">Valor do desconto</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Validade</label>
                    <input type="date" class="form-control" name="validade" value="<?php echo $validade ?>" required>
                </div><hr>
                <button type="submit" class="btn btn-sm btn-outline-warning"><i class="fa fa-save"></i> Salvar Alteraçoes</button>
            </form>
            <?php endforeach ?>
        <?php } ?>
    </div>
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Desconto</th>
                <th scope="col">Validade</th>
                <th scope="col"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $read = new Read(); $read->ExeRead('cupons');
                foreach($read->getResult() as $cupon):
                    extract($cupon);
                ?>
                <tr>
                <th scope="row"><?php echo $id; ?></th>
                <td><?php echo $nome; ?></td>
                <td>R$ <?php echo $desconto; ?></td>
                <td><?php echo $validade; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo Url::getBase().'cupon/'.$id ?>"  class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo Url::getBase().'controllers/delete.php?pag=cupon&tb=cupons&ch=id&value='.$id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>