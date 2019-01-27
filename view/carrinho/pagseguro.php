<?php
    require_once('../../panel/controllers/init.inc');
    require_once('../../panel/vendor/autoload.php');
    $Data = [
        "email"=>"brutusbrasil@outlook.com",
        "token"=>"D6D57BC4E25E4D4687D24BFFEE7B2CC9",//PROD->D304B3144BC74FDC9B9069C72DA33E52
        "currency"=>"BRL",
        "itemId1"=>"1",
        "itemDescription1"=>'Loja Brutus Brasil - Pedido '.$_SESSION['carrinho'],
        "itemAmount1"=>$_SESSION['valor'],
        "itemQuantity1"=>"1",
        "itemWeight1"=>"1000",
        "reference"=>$_SESSION['carrinho'],
        "senderName"=>'Loja Brutus Brasil',
        "senderAreaCode"=>"84",
        "senderPhone"=>'',//$_SESSION['telefone'],
        "senderEmail"=>"c81538586083005954189@sandbox.pagseguro.com.br",//$_SESSION['email'],//
        "shippingType"=>"1",
        "shippingAddressStreet"=>'',//$_SESSION['rua'],
        "shippingAddressNumber"=>'',//$_SESSION['numero'],
        "shippingAddressComplement"=>'',//$_SESSION['bairro'],
        "shippingAddressDistrict"=>'',
        "shippingAddressPostalCode"=>'',//$_SESSION['cep'],
        "shippingAddressCity"=>'',//$_SESSION['cidade'],
        "shippingAddressState"=>'',//$_SESSION['uf'],
        "shippingAddressCountry"=>"BRA"
    ];

    
    $BuildQuery=http_build_query($Data);
    //produção -> retirar o nome sandbox da url
    //produção -> trocar o token
    $Url="https://ws.sandbox.pagseguro.uol.com.br/v2/checkout";
    
    $Curl=curl_init($Url);

    curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
    curl_setopt($Curl,CURLOPT_POST, true);
    curl_setopt($Curl,CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($Curl,CURLOPT_RETURNTRANSFER, true);
    curl_setopt($Curl,CURLOPT_POSTFIELDS, $BuildQuery);
    $Retorno=curl_exec($Curl);
    curl_close($Curl);
    
    $Xml=simplexml_load_string($Retorno);
    
    unset($_SESSION['carrinho']);
    
    echo  $Xml->code;
    
?>