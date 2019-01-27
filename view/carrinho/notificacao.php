<?php
header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");

$notificationCode = preg_replace('/[^[:alnum:]-]/','',$_POST["notificationCode"]);

$data['token'] ='brutusbrasil@outlook.com';
$data['email'] = 'D6D57BC4E25E4D4687D24BFFEE7B2CC9';

$data = http_build_query($data);

$url = 'https://ws.sandbox.pagseguro.uol.com.br/v3/transactions/notifications/'.$notificationCode.'?'.$data;

$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, $url);
$xml = curl_exec($curl);
curl_close($curl);

$xml = simplexml_load_string($xml);

$reference = $xml->reference;
$status = $xml->status;

if($reference && $status){

 include_once '../../panel/controllers/init.inc';
 include_once '../../panel/vendor/autoload.php';

 $rs_pedido = Validation::consultarPedido($reference);

 if($rs_pedido){
    Validation::atualizaPedido($reference,$status);
 }
}

?>
