<?php 
require_once('../../panel/controllers/init.inc');
require_once('../../panel/vendor/autoload.php');

$result = finalizaPedido();

echo json_encode($result);

function finalizaPedido(){
    $dados = ['valor'=>$_POST['total_pedido'],'id_status'=> 1,'entrega'=>$_POST['entrega']];
    $update = new Update();
    $update->ExeUpdate('pedidos', $dados, 'where id = :id', 'id='.$_POST['id_pedido']);
    if($update->getRowCount() > 0){
        return array($_POST['id_pedido'],$_POST['total_pedido']);
    }else{
        return 'Error';
    }
};

?>