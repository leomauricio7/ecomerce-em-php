<?php 

require_once('../panel/controllers/init.inc');
require_once('../panel/vendor/autoload.php');

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$result = validaCupon($dados);

echo json_encode($result);

function validaCupon($data){
    $read = new Read();
    $read->Exeread('cupons','where nome = :nome', 'nome='.$data['cupon']);
    if($read->getRowCount() > 0){
        foreach($read->getResult() as $cupon){
            extract($cupon);
            $dataAtual = Date('Y-m-d');
            if($validade > $dataAtual){
                
                if(duplycatCupon($id)){
                    $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Cupon <strong> '.$nome.'</strong> validado com sucesso!</div>';
                    return aplyCupon($tipo, $desconto, $id);
                }else{
                    $_SESSION['msg'] = '<div class="alert alert-info" role="alert"><strong>Atenção:</strong> Um cupon ja foi utilizado nesse pedido!.</div>';
                    return 'Duplycat cupon';
                }
                
            }elseif($validade < $dataAtual){
                $_SESSION['msg'] = '<div class="alert alert-info" role="alert">Cupon <strong> '.$nome.'</strong> expirado!</div>';
            }
            return $nome;
        }
    }else{
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Cupon inválido</div>';
        return 'cupon Inválido';
    }
};

function aplyCupon($tipo, $desconto, $id){
    $update = new Update();
    //porcentagem
    if($tipo == 1){
        $porcentagem = $desconto/100;
        $valorFinal = $_POST['subTotalPedido'] - ($porcentagem * $_POST['subTotalPedido']);
        $dados = ['id_cupon'=> $id];
        $update->ExeUpdate('pedidos',$dados, 'where id = :id', 'id='.$_POST['id_pedido']);
        if($update->getRowCount(0 > 0)){
            return array($valorFinal,$desconto);
        }else{
            return 'Error';
        }
    }
    //reais
    elseif($tipo ==2){
        $valorFinal = $_POST['subTotalPedido'] - $desconto;
        $dados = ['id_cupon'=> $id];
        $update->ExeUpdate('pedidos',$dados, 'where id = :id', 'id='.$_POST['id_pedido']);
        if($update->getRowCount() > 0){
            return array($valorFinal,$desconto);
        }else{
            return 'Error';
        }
    }
};

function duplycatCupon($idCupon){
    $read = new read();
    $read->ExeRead('pedidos', 'where id = :id AND id_cupon is null', 'id='.$_POST['id_pedido']);
    if($read->getRowCount() > 0){
        return true;
    }else{
        return false;
    }
}

?>