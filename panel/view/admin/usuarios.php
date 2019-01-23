<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Usuários</li>
  </ol>
</nav>
<div class="row">
    <div class="col">
    <?php if(Url::getURL(1) == ''){ ?>
    <!-- cadastro de categoria-->
        <?php
        if ($_POST):
                $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                $user = new User();
                $user->CreateUser($dados);

                if (!$user->getResult()):
                    echo $user->getMsg();
                else:
                    echo $user->getMsg();
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
                <input type="text" class="form-control" name="nome" aria-describedby="emailHelp" placeholder="Nome" required autofocus>
                <small id="emailHelp" class="form-text text-muted">Nome</small>
            </div>
            <div class="form-row">
                <div class="form-group col-4">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group col-4">
                    <label for="exampleInputPassword1">CPF</label>
                    <input type="number" class="form-control" name="cpf" placeholder="CPF" minlength="11" maxlength="11" required>
                </div>
                <div class="form-group col-4">
                    <label for="exampleInputPassword1">Senha</label>
                    <input type="text" class="form-control" name="senha" id="senha" readonly required>
                    <small id="emailHelp" class="form-text text-muted"><a id="geraSenha" class="btn btn-sm btn-info btn-link">Gerar senha</a></small>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="exampleInputPassword1">Tipo</label>
                    <select class="form-control" name="type" required>
                        <option value="">--SELECIONE--</option>
                        <option value="1">Administrador</option>
                        <option value="2">Cliente</option>
                    </select>
                </div>
                <div class="form-group col">
                    <label for="exampleInputPassword1">CEP</label>
                    <input type="text" class="form-control" name="cep" id="cep" maxlength="8" minlength="8" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-2">
                    <label for="exampleInputPassword1">UF</label>
                    <input type="text" class="form-control" name="uf" id="uf" required>
                </div>
                <div class="form-group col">
                    <label for="exampleInputPassword1">Cidade</label>
                    <input type="text" class="form-control" name="cidade" id="cidade" required>
                </div>
                <div class="form-group col">
                    <label for="exampleInputPassword1">Bairro</label>
                    <input type="text" class="form-control" name="bairro" id="bairro" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="exampleInputPassword1">Rua</label>
                    <input type="text" class="form-control" name="rua" id="rua" required>
                </div>
                <div class="form-group col-3">
                    <label for="exampleInputPassword1">Número</label>
                    <input type="number" class="form-control" name="numero" required>
                </div>
                <div class="form-group col">
                    <label for="exampleInputPassword1">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="telefone" required>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-save"></i> Finalizar Cadastro</button>
        </form>
        <?php }else{ ?>
        <!--edição de usuarios-->
            <?php
            $id = Url::getURL(1);
            if ($_POST):
          
                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                    $update = new Update();
                    //verifica se o usuario enviou alguma imagem
                    $dados = [
                        'nome' => $dados['nome'],
                        'email' => $dados['email'],
                        'cpf' => $dados['cpf'],
                        'email' => $dados['email'],
                        'rua' => $dados['rua'],
                        'uf' => $dados['uf'],
                        'cep' => $dados['cep'],
                        'cidade' => $dados['cidade'],
                        'type' => $dados['type'],
                        'bairro' => $dados['bairro'],
                        'numero' => $dados['numero'],
                        'telefone' => $dados['telefone'],
                        ];
                    $update->ExeUpdate('usuarios', $dados, 'WHERE id = :id', 'id=' . $id . '');
                    
    
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
                $read->ExeRead('usuarios','where id = :id', 'id='.$id);
                foreach($read->getResult() as $user):
                    extract($user);
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $nome ?>" required autofocus>
                    <small id="emailHelp" class="form-text text-muted">Nome</small>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email ?>" required>
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputPassword1">CPF</label>
                        <input type="number" class="form-control" name="cpf" placeholder="CPF" minlength="11" maxlength="11" value="<?php echo $cpf ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="exampleInputPassword1">Tipo</label>
                        <select class="form-control" name="type" required>
                            <option value="">--SELECIONE--</option>
                            <option value="1" <?php echo $type == 1 ? 'selected': '' ?>>Administrador</option>
                            <option value="2" <?php echo $type == 2 ? 'selected': '' ?>>Cliente</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputPassword1">CEP</label>
                        <input type="text" class="form-control" name="cep" id="cep" maxlength="8" minlength="8" value="<?php echo $cep ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-2">
                        <label for="exampleInputPassword1">UF</label>
                        <input type="text" class="form-control" name="uf" id="uf" value="<?php echo $uf ?>" required>
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputPassword1">Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $cidade ?>" required>
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputPassword1">Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $bairro ?>" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col">
                        <label for="exampleInputPassword1">Rua</label>
                        <input type="text" class="form-control" name="rua" id="rua" value="<?php echo $rua ?>" required>
                    </div>
                    <div class="form-group col-3">
                        <label for="exampleInputPassword1">Número</label>
                        <input type="number" class="form-control" name="numero" value="<?php echo $numero ?>" required>
                    </div>
                    <div class="form-group col">
                        <label for="exampleInputPassword1">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $telefone ?>" required>
                    </div>
                </div><hr>
                <button type="submit" class="btn btn-sm btn-outline-warning"><i class="fa fa-save"></i> Salvar alterações</button><hr>
            </form>
            <?php endforeach ?>
        <?php } ?>
    </div>
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col"><i class="fa fa-cog"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $read = new Read(); $read->ExeRead('usuarios');
                foreach($read->getResult() as $user):
                    extract($user);
                ?>
                <tr>
                <th scope="row"><?php echo $id; ?></th>
                <td><?php echo $nome; ?></td>
                <td><?php echo $email; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="<?php echo Url::getBase().'usuarios/'.$id ?>"  class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo Url::getBase().'controllers/delete.php?pag=usuarios&tb=usuarios&ch=id&value='.$id ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    </div>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>