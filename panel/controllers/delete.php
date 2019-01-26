<?php

require_once './init.inc';
require_once '../vendor/autoload.php';

if (isset($_GET) && !empty($_GET)) {
    $read_pag = filter_input(INPUT_GET, 'pag') ? filter_input(INPUT_GET, 'pag') : null;
    $tabela = filter_input(INPUT_GET, 'tb') ? filter_input(INPUT_GET, 'tb') : null;
    $chp = filter_input(INPUT_GET, 'ch') ? filter_input(INPUT_GET, 'ch') : null;
    $id = filter_input(INPUT_GET, 'value') ? filter_input(INPUT_GET,'value') : null;
    $delete = new Delete();
    //removendo a ultima caractere da instrução
    //$pag = substr($read_pag,0,-1);
    if($read_pag == 'pedidos'){
        unset($_SESSION['carrinho']);
    }
    
    $delete->ExeDelete($tabela, 'WHERE '.$chp.' = ' . $id);
    $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible" role="alert">
                Exclusão realizada com sucesso!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="cursor: pointer;">&times;</span>
                </button>
            </div>';
    echo '<script>window.location.href="../' . $read_pag . '";</script>';
}