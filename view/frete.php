<?php 

require_once('../panel/controllers/init.inc');
require_once('../panel/vendor/autoload.php');

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$result = calculaFrete($dados);

echo json_encode($result);

function calculaFrete($data){

        $cepOrigem = '59570000';
        $cepDestino = $data['cep'];
        $valor = $data['valor'];
        $tipoFrete = $data['tipo_frete'];
        $idpedido = $data['pedido_id'];

        $data = [
            'nCdEmpresa'=> '',
            'sDsSenha'=> '',
            'nCdServico'=> $tipoFrete,
            'sCepOrigem'=> $cepOrigem,
            'sCepDestino'=> $cepDestino,
            'nVlPeso'=> '1',
            'nCdFormato'=> '1',
            'nVlComprimento'=> '30',
            'nVlAltura'=> '30',
            'nVlLargura'=> '30',
            'nVlDiametro'=> '0',
            'sCdMaoPropria'=> 's',
            'nVlValorDeclarado'=> $valor,
            'sCdAvisoRecebimento' => 'n',
            'StrRetorno' => 'xml',
        ];

        $data = http_build_query($data);

        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';

        $curl = curl_init($url . '?' . $data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($curl);
        $result = simplexml_load_string($result);
        $frete = $result->cServico;
        return $frete;
    };

?>