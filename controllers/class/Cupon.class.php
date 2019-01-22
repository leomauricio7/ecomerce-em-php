<?php

class Cupon {

    public $Titulo;
    public $Conteudo;
    public $Dados;

    const Entity = 'cupons';

    function CreateCupon(array $Dados) {
        $this->Dados = $Dados;

        $create = new Create();
        $create->ExeCreate(self::Entity, $this->Dados);
        if ($create->getResult()):
            $this->Result = $create->getResult();
            $this->Msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong><i class='fa fa-check-circle'></i></strong> O cupon foi cadastrado com sucesso.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true' style='cursor: pointer;'>&times;</span>
                    </button>
                </div>";
        else:
            $this->Result = $create->getResult();
            $this->Msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong><i class='fa fa-warning'></i></strong> O cupon não foi cadastrado.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true' style='cursor: pointer;'>&times;</span>
                    </button>
                </div>";
        endif;
    }

    function getResult() {
        return $this->Result;
    }

    function getMsg() {
        return $this->Msg;
    }

}