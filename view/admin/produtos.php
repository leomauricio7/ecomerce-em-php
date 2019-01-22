<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Produtos</li>
  </ol>
</nav>
<div class="row">
    <div class="col">
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Slug</label>
                    <input type="text" class="form-control" name="slug" placeholder="Slug" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Imagens do produto</label>
                <input type="file" class="form-control" name="images[]" multiple required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Peso</label>
                    <input type="text" name="peso" class="form-control" placeholder="0 kg" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Altura</label>
                    <input type="text" name="altura" class="form-control" placeholder="0 cm" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Largura</label>
                    <input type="text" name="largura" class="form-control" placeholder="0 cm" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Comprimento</label>
                    <input type="text" name="comprimento" class="form-control" placeholder="0 cm" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Valor</label>
                    <input type="text" name="valor" class="form-control" placeholder="R$ 0.00" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Quantidade</label>
                    <input type="number" name="valor" class="form-control" placeholder="0 Und" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Categoria</label>
                    <select class="form-control" name="id_categoria" required>
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
                <div class="form-group col-md-4">
                    <label>Cor</label>
                    <select class="form-control" name="id_cor" readonly>
                        <option value="" selected>--Selecione--</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Tamanho</label>
                    <select class="form-control" name="id_tamanho" readonly>
                        <option value="" selected>--Selecione--</option>
                        <option>...</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label>Feiche</label>
                    <select class="form-control" name="id_feiche" readonly>
                        <option value="" selected>--Selecione--</option>
                    </select>
                </div>
            </div><hr>
            <button type="submit" class="btn btn-sm btn-success">Cadastrar Produto</button>
        </form>
    </div>
    <div class="col">
        <table class="table">
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
                <td><?php echo $valor; ?></td>
                <td><?php echo $quantidade; ?></td>
                <td><?php echo $created; ?></td>
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