<?php

class Usuario{
	
	private $Data;
	private $Msg;
	private $Result;
	
	//Nome da Tabela do banco de Dados
	const Entity = 'usuarios';
	
	//Envelopa o nome, email em um array atribuitivo
	//@parm ARRAY $Data = Atribuitivo
	public function ExeCreate(array $Data){
		$this->Data = $Data;
		$this->checkData();
                unset($this->Data['confirmasenha']);
		if($this->Result):
			$this->Create();
		endif;
	}
	
	//Verifica o cadastro 
	//Retorna TRUE se o cadstro for efetuado ou FALSE se não
	function getResult(){
		return $this->Result;
	}
	//Retorna o tipo de erro
	function getMsg(){
		return $this->Msg;
	}
	
	//Valida e crias os dados para realizar o cadastro
	private function checkData(){
		$this->Data = array_map('strip_tags', $this->Data);
		$this->Data = array_map('trim', $this->Data);
		
                if(in_array('', $this->Data)):
			$this->Result = false;
			$this->Msg = "<div class='alert alert-danger'><b>Erro ao cadastrar: </b>Para cadastrar o usuario preencha todos os campos!</div>";
		
                elseif(!Valida::Email($this->Data['email'])):
			$this->Result = false;
			$this->Msg = "<div class='alert alert-danger'><b>Erro ao cadastrar: </b>E-mail invalido!</div>";
                
                elseif(!Valida::Number($this->Data['cpf'])):
			$this->Result = false;
			$this->Msg = "<div class='alert alert-danger'><b>Erro ao cadastrar: </b>CPF/CNPJ inválido!</div>";
                
                elseif(!Valida::Number($this->Data['rg'])):
			$this->Result = false;
			$this->Msg = "<div class='alert alert-danger'><b>Erro ao cadastrar: </b>RG inválido!</div>";      
		
                elseif($this->Data['senha'] != $this->Data['confirmasenha']):
			$this->Result = false;
			$this->Msg = "<div class='alert alert-danger'><b>Erro ao cadastrar: </b>Senhas não coincidem!</div>";
                else:
			$this->Result = true;
		endif;
	}
	
	//Cadastra o usuário no banco de dados
	private function Create(){
		$Create = new CreateMN();
		$Create->ExeCreate(self::Entity, $this->Data);
		if($Create->getResult()):
                    $this->Result = $Create->getResult();
                    $this->Msg = "<div class='alert alert-success'><b>Sucesso: </b>O usuário {$this->Data['nome']} foi cadastrado no sistema!</div>";
		endif;
	}
}