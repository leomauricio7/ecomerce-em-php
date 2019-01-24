<?php

class User {

    public $Nome;
    public $Conteudo;
    public $Dados;

    const Entity = 'usuarios';

    function CreateUser(array $Dados) {
        $this->Dados = $Dados;
        $this->Dados['senha'] = password_hash($this->Dados['senha'], PASSWORD_DEFAULT);

        $create = new Create();
        $create->ExeCreate(self::Entity, $this->Dados);
        if ($create->getResult()):
            $this->Result = $create->getResult();
            $this->Msg = "<div class='alert alert-success' role='alert'>
                    <strong><i class='fa fa-check-circle'></i></strong> Usuário <strong>{$this->Dados['nome']}</strong> foi cadastrado com sucesso.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true' style='cursor: pointer;'>&times;</span>
                    </button>
                </div>";
        else:
            $this->Result = $create->getResult();
            $this->Msg = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong><i class='fa fa-warning'></i></strong> O usuário <strong>{$this->Dados['nome']}</strong> não foi cadastrado.
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
