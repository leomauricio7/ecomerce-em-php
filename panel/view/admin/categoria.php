<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Categorias</li>
  </ol>
</nav>
<div class="row">
    <div class="col">
    <?php if(Url::getURL(1) == ''){ ?>
    <!-- cadastro de categoria-->
        <?php
        if ($_POST):
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $dados['image'] = ($_FILES['image']['tmp_name'] ? $_FILES['image'] : null);
                $file = $_FILES['image'];
                $categoria = new Categoria();
                $categoria->CreateCategoria($dados);

                if (!$categoria->getResult()):
                    echo $categoria->getMsg();
                else:
                    $uploud = new Uploud();
                    $uploud->Imagem($file, 'categoria/' . $categoria->getResult() . '/');
                    echo $categoria->getMsg();
                    unset($dados);
                endif;
                unset($dados);
            endif;
            if (!empty($_SESSION['msg'])):
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            endif;
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" name="nome" id="text" aria-describedby="emailHelp" placeholder="Nome" required autofocus>
                <small id="emailHelp" class="form-text text-muted">Nome da categoria</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" readonly required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Imagem da categoria</label>
                <input type="file" class="form-control-file" name="image" required>
            </div><hr>
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Finalizar Cadastro</button>
        </form>
        <?php }else{ ?>
        <!--edição de categoria-->
            <?php
            $id = Url::getURL(1);
            if ($_POST):
          
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    $dados['image'] = ($_FILES['image']['tmp_name'] ? $_FILES['image'] : null);
                    $file = $_FILES['image'];
                    $update = new Update();
                    //verifica se o usuario enviou alguma imagem
                    if (!empty($dados['image'])):
                        $uploud = new Uploud();
                        $uploud->ImagemEdit($file, 'categoria/' . URL::getURL(1) . '/');
                        //verifica se foi feito o upload
                        if (!$uploud->getResult()):
                            echo $uploud->getMsg();
                        else:
                            $dados = ['image' => $dados['image'], 'nome' => $dados['nome'], 'slug' => $dados['slug']];
                            $update->ExeUpdate('categorias', $dados, 'WHERE id = :id', 'id=' . $id . '');
                        endif;
                    else:
                        $dados = ['nome' => $dados['nome'], 'slug' => $dados['slug']];
                        $update->ExeUpdate('categorias', $dados, 'WHERE id = :id', 'id=' . $id . '');
                    endif;
    
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
                $read->ExeRead('categorias','where id = :id', 'id='.$id);
                foreach($read->getResult() as $categoria):
                    extract($categoria);
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" name="nome" id="text" aria-describedby="emailHelp" placeholder="Nome" value="<?php echo $nome ?>" required autofocus>
                    <small id="emailHelp" class="form-text text-muted">Nome da categoria</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" readonly value="<?php echo $slug ?>" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Imagem da categoria</label>
                    <input type="file" class="form-control-file" name="image">
                    <small id="emailHelp" class="form-text text-muted"><?php echo $image ?></small>
                </div><hr>
                <button type="submit" class="btn btn-sm btn-outline-warning"><i class="fa fa-save"></i> Salvar Alteraçoes</button>
            </form>
            <?php endforeach ?>
        <?php } ?>
    </div>
    <div class="col">
        <table class="table" id="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Slug</th>
                <th scope="col"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $read = new Read(); $read->ExeRead('categorias');
                foreach($read->getResult() as $categoria):
                    extract($categoria);
                ?>
                <tr>
                <th scope="row"><?php echo $id; ?></th>
                <td><?php echo $nome; ?></td>
                <td><?php echo $slug; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo Url::getBase().'categoria/'.$id ?>"  class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo Url::getBase().'controllers/delete.php?pag=categoria&tb=categorias&ch=id&value='.$id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>