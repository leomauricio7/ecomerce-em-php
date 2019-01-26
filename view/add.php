<?php
///var_dump($_POST);
require_once('../panel/controllers/init.inc');
require_once('../panel/vendor/autoload.php');
$update = new Update();
$dados = ['quantidade' => $_POST['qtd']+1];
$update->ExeUpdate('produtos_pedido', $dados, 'where id = :id', 'id='.$_POST['id_produto_pedido']);

echo json_encode($_POST);