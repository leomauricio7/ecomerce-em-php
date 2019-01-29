<?php 
if($_POST){
    //verifica se o usuario esta logado
    if(!isset($_SESSION['logado'])){
        if(isset($_POST['page'])){
            echo "<script>window.location.assign('../login')</script>";
        }else{
            echo "<script>window.location.assign('./login')</script>";
        }
        
    }else{
        //se ja tiver logado
        $idUser = intval($_SESSION['idUser']);
        $idProduto = 0;
        //dados do pedido
        $dados = ['id_usuario'=> $idUser,'id_status' => 8];
        //objeto de criar um produto
        $adicionaProduto = new Create();
        //objeto de ler um produto
        $readProduto = new Read();
        //objeto de ler um produto de um pedido
        $readPedidoProduto = new Read();
        //onjeto de alterar um produto
        $updateProduto = new Update();
        //pesquisando os dados do produto
        $readProduto->ExeRead('produtos', 'where id= :id', 'id='.$_POST['idProduto']);
        //percorrendo os dados do produto
        foreach($readProduto->getResult() as $produto){
            extract($produto);
            $idProduto = $id;
        }
        //verifica se ja foi iniciado uma sessão do carrinho
        if(isset($_SESSION['carrinho'])){
            //verificando se o produto ja foi adicionado
            $readPedidoProduto->ExeRead('produtos_pedido','where id_produto = '.$idProduto.' AND id_pedido = '.$_SESSION['carrinho']);
            if($readPedidoProduto->getResult()){
               foreach($readPedidoProduto->getResult() as $produtoPedido){
                   extract($produtoPedido);
                   $dadosUpdate = ['quantidade' => $quantidade+1];
                   $updateProduto->ExeUpdate('produtos_pedido', $dadosUpdate, 'where id = :id', 'id='.$id);
               }
                
            }else{
                $dadosProduto = ['id_produto'=> $idProduto, 'id_pedido' => intval($_SESSION['carrinho']), 'quantidade'=> 1];
                $adicionaProduto->ExeCreate('produtos_pedido', $dadosProduto);
            }
   
        }else{
            //se não existe a session do caarinho cria a sessão
            $createPedido = new Create();
            $createPedido->ExeCreate('pedidos',$dados);
            //pega o id do pedido
            $_SESSION['carrinho'] = $createPedido->getResult();
            //dados do produto aser adicionado ao carrinho
            $dadosProduto = ['id_produto'=> $idProduto, 'id_pedido' => intval($_SESSION['carrinho']), 'quantidade'=>1];
            //adicionando produto ao carrinho
            $adicionaProduto->ExeCreate('produtos_pedido', $dadosProduto);
        }
       
    }
}
?>