<?php
header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");

if(isset($_GET['notificationType']) && $_GET['notificationType'] == 'transaction'){
    $email = 'brutusbrasil@outlook.com';
    $token = 'D6D57BC4E25E4D4687D24BFFEE7B2CC9';
    //producao
    //$url = 'https://ws.pagseguro.uol.com.br/v2/transactions/notifications/' . $_GET['notificationCode'] . '?email=' . $email . '&token=' . $token;
    //sandbox
    $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/' . $_GET['notificationCode'] . '?email=' . $email . '&token=' . $token;
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transaction= curl_exec($curl);
    if($transaction == 'Unauthorized'){
        //Insira seu código avisando que o sistema está com problemas, sugiro enviar um e-mail avisando para alguém fazer a manutenção 
        echo $transaction;
       exit;//Mantenha essa linha
    }
    curl_close($curl);
    $transaction = simplexml_load_string($transaction);

    $reference = $transaction->reference;
    $status = $transaction->status;
    
    if($reference && $status){

     include_once '../../panel/controllers/init.inc';
     include_once '../../panel/vendor/autoload.php';
    
     $rs_pedido = Validation::consultaPedido($reference);
    
     if($rs_pedido == 1 ){
        $result = Validation::atualizaPedido($reference,$status);
        echo $result;
     }else{
        echo $rs_pedido;
     }
     
    }
    
}
?>