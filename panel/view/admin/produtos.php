<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Produtos</li>
  </ol>
</nav>
<div class="row">
    <div class="col">
    <?php if(Url::getURL(1) == ''){ ?>
    <?php 
    if ($_POST) {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if($dados['id_categoria'] != 17){
            unset($dados['id_cor']);
            unset($dados['id_tamanho']);
            unset($dados['id_feiche']);
        }

        $produto = new Produto();
        $produto->createProduto($dados);
        if (!$produto->getResult()):
            echo $produto->getMsg();
        else:
            $produto->uploudMultiplo($_FILES['images'], $produto->getResult());
            echo $produto->getMsg();
            unset($dados);
        endif;
    }
    ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" id="text" placeholder="Nome" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" readonly required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Descrição do Produto</label>
                <textarea class="form-control" name="descricao"required></textarea>
            </div>
            <div class="form-group">
                <label for="inputAddress">Imagens do produto</label>
                <input type="file" class="form-control" name="images[]" multiple required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Peso <strong>kg</strong></label>
                    <input type="text" name="peso" class="form-control" placeholder="0 kg" value="1" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Altura <strong>cm</strong></label>
                    <input type="text" name="altura" class="form-control" placeholder="0 cm" value="30" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Largura <strong>cm</strong></label>
                    <input type="text" name="largura" class="form-control" placeholder="0 cm" value="30" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Comprimento</label>
                    <input type="text" name="comprimento" class="form-control" placeholder="0 cm" value="30" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Valor</label>
                    <input type="text" name="valor" class="form-control" placeholder="R$ 0.00" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" placeholder="0 Und" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Categoria</label>
                    <select class="form-control" name="id_categoria" id="categoria" required>
                        <option value="" selected>--Selecione--</option>
                        <?php 
                        $read_categoria = new Read();
                        $read_categoria->ExeRead('categorias');
                        foreach($read_categoria->getResult() as $categoria){
                            extract($categoria);
                        ?>
                        <option value="<?php echo $id ?>"><?php echo $nome ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4" id="cor">
                    <label>Cor</label>
                    <select class="form-control" name="id_cor">
                        <option value="" selected>--Selecione--</option>
                        <?php 
                        $read_cores = new Read();
                        $read_cores->ExeRead('cores');
                        foreach($read_cores->getResult() as $cor){
                            extract($cor);
                        ?>
                        <option value="<?php echo $id ?>"><?php echo $nome ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4" id="tamanho">
                    <label>Tamanho</label>
                    <select class="form-control" name="id_tamanho">
                        <option value="" selected>--Selecione--</option>
                        <?php 
                        $read_tamanho = new Read();
                        $read_tamanho->ExeRead('tamanhos');
                        foreach($read_tamanho->getResult() as $tamanho){
                            extract($tamanho);
                        ?>
                        <option value="<?php echo $id ?>"><?php echo $tamanho ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4" id="feiche">
                    <label>Feiche</label>
                    <select class="form-control" name="id_feiche">
                        <option value="" selected>--Selecione--</option>
                        <?php 
                        $feiches = new Read();
                        $feiches->ExeRead('feichos');
                        foreach($feiches->getResult() as $feiche){
                            extract($feiche);
                        ?>
                        <option value="<?php echo $id ?>"><?php echo $nome ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div><hr>
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Cadastrar Produto</button>
        <hr>
        </form>
    <?php }else{ ?>
       <!--se for edição de produto -->
    <?php
       $id =  Url::getUrl(1); 
    if ($_POST) {

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        if($dados['id_categoria'] != 17){
            unset($dados['id_tamanho']);
            unset($dados['id_feiche']);
        }

        $update = new Update();
        if($dados['id_categoria'] == 17){
            $dados = [
                'nome' => $dados['nome'],
                'descricao' => $dados['descricao'],
                'slug' => $dados['slug'],
                'peso' => $dados['peso'],
                'altura' => $dados['altura'],
                'largura' => $dados['largura'],
                'comprimento' => $dados['comprimento'],
                'valor' => $dados['valor'],
                'quantidade' => $dados['quantidade'],
                'id_categoria' => $dados['id_categoria'],
                'id_cor' => $dados['id_cor'],
                'id_feiche' => $dados['id_feiche'],
                'id_tamanho' => $dados['id_tamanho'],
            ];
        }else{
            $dados = [
                'nome' => $dados['nome'],
                'descricao' => $dados['descricao'],
                'slug' => $dados['slug'],
                'peso' => $dados['peso'],
                'altura' => $dados['altura'],
                'largura' => $dados['largura'],
                'comprimento' => $dados['comprimento'],
                'valor' => $dados['valor'],
                'id_cor' => $dados['id_cor'],
                'quantidade' => $dados['quantidade'],
                'id_categoria' => $dados['id_categoria']
            ];
        }
        
        if(isset($_FILES['images'])){
            $produto = new Produto();
            $produto->uploudMultiplo($_FILES['images'], $id);
        }

        $update->ExeUpdate('produtos', $dados, 'WHERE id = :id', 'id=' . $id . '');

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
        unset($dados);
        endif;
    }
    $read = new Read();
    $read->ExeRead('produtos','where id = :id', 'id='.$id.'');
    foreach($read->getResult() as $produto){
        extract($produto);
    ?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" id="text" value="<?php echo $nome ?>" placeholder="Nome" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Slug</label>
                    <input type="text" class="form-control" name="slug" id="slug" value="<?php echo $slug ?>" readonly required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Descrição do Produto</label>
                <textarea class="form-control" name="descricao"required><?php echo $descricao ?></textarea>
            </div>
            <div class="form-group">
                <label for="inputAddress">Imagens do produto</label>
                <input type="file" class="form-control" name="images[]" multiple>
                <table class="table">
                    <thead>
                        <th>Imagem</th>
                        <th><i class="fa fa-cog"></i></th>
                    </thead>
                    <tbody>
                    <?php 
                    $read_images = new Read();
                    $read_images->ExeRead('images_produto', 'where id_produto = '.$id);
                    $idPasta = $id;
                    foreach($read_images->getrESULT() AS $images):
                        extract($images);
                    ?>
                        <tr>
                            <td><img width="50"src="<?php echo Url::getBase().'uploud/produto/'.$idPasta.'/'.$image ?>"></td>
                            <td><a href="<?php echo Url::getBase().'controllers/delete.php?pag=produtos/'.$idPasta.'&tb=images_produto&ch=id&value='.$id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Peso <strong>kg</strong></label>
                    <input type="text" name="peso" class="form-control" placeholder="0 kg" value="<?php echo $peso ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Altura <strong>cm</strong></label>
                    <input type="text" name="altura" class="form-control" placeholder="0 cm" value="<?php echo $altura ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Largura <strong>cm</strong></label>
                    <input type="text" name="largura" class="form-control" placeholder="0 cm" value="<?php echo $largura ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Comprimento</label>
                    <input type="text" name="comprimento" class="form-control" placeholder="0 cm" value="<?php echo $comprimento ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Valor</label>
                    <input type="text" name="valor" class="form-control" placeholder="R$ 0.00" value="<?php echo $valor ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" placeholder="0 Und" value="<?php echo $quantidade ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Categoria</label>
                    <select class="form-control" name="id_categoria" id="categoria" required>
                        <option value="" selected>--Selecione--</option>
                        <?php 
                        $read_categoria = new Read();
                        $read_categoria->ExeRead('categorias');
                        foreach($read_categoria->getResult() as $categoria){
                            extract($categoria);
                        ?>
                        <option value="<?php echo $id ?>" <?php echo $id_categoria == $id ? 'selected' : ''?>><?php echo $nome ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4" id="cor">
                    <label>Cor</label>
                    <select class="form-control" name="id_cor">
                        <option value="" selected>--Selecione--</option>
                        <?php 
                        $read_cores = new Read();
                        $read_cores->ExeRead('cores');
                        foreach($read_cores->getResult() as $cor){
                            extract($cor);
                        ?>
                        <option value="<?php echo $id ?>" <?php echo $id_cor == $id ? 'selected' : ''?>><?php echo $nome ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4" id="tamanho">
                    <label>Tamanho</label>
                    <select class="form-control" name="id_tamanho">
                        <option value="" selected>--Selecione--</option>
                        <?php 
                        $read_tamanho = new Read();
                        $read_tamanho->ExeRead('tamanhos');
                        foreach($read_tamanho->getResult() as $tamanho){
                            extract($tamanho);
                        ?>
                        <option value="<?php echo $id ?>" <?php echo $id_tamanho == $id ? 'selected' : ''?>><?php echo $tamanho ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-md-4" id="feiche">
                    <label>Feiche</label>
                    <select class="form-control" name="id_feiche">
                        <option value="" selected>--Selecione--</option>
                        <?php 
                        $feiches = new Read();
                        $feiches->ExeRead('feichos');
                        foreach($feiches->getResult() as $feiche){
                            extract($feiche);
                        ?>
                        <option value="<?php echo $id ?>" <?php echo $id_feiche == $id ? 'selected' : ''?>><?php echo $nome ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div><hr>
            <button type="submit" class="btn btn-sm btn-outline-warning">Salvar alterações</button>
        </form>
        <?php 
            }
        } ?>
    </div>
    <div class="col">
        <table class="table" id="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Produto</th>
                <th scope="col">Valor UNT</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Created</th>
                <th scope="col"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $read = new Read(); $read->ExeRead('produtos');
                foreach($read->getResult() as $produto):
                    extract($produto);
                ?>
                <tr>
                <th scope="row"><?php echo $id; ?></th>
                <td><?php echo $nome; ?></td>
                <td>R$ <?php echo number_format($valor, 2, ",", ""); ?></td>
                <td><?php echo $quantidade; ?></td>
                <td><?php echo $created; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo Url::getBase().'produtos/'.$id ?>"  class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo Url::getBase().'controllers/delete.php?pag=produtos&tb=produtos&ch=id&value='.$id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>