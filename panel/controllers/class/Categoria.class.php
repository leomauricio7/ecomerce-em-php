<?php

class Categoria {

    public $Nome;
    public $Conteudo;
    public $Dados;

    const Entity = 'categorias';

    function CreateCategoria(array $Dados) {
        $this->Dados = $Dados;
        $this->Dados['image'] = $this->Dados['image']['name'];

        $create = new Create();
        $create->ExeCreate(self::Entity, $this->Dados);
        if ($create->getResult()):
            $this->Result = $create->getResult();
            $this->Msg = "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong><i class='fa fa-check-circle'></i></strong> A categoria <strong>{$this->Dados['nome']}</strong> foi cadastrada com sucesso.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true' style='cursor: pointer;'>&times;</span>
                    </button>
                </div>";
        else:
            $this->Result = $create->getResult();
            $this->Msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong><i class='fa fa-warning'></i></strong> A categoria <strong>{$this->Dados['nome']}</strong> não foi cadastrada.
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
