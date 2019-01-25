<?php

class Read extends Conn{
    private $Select;
    private $Places;
    private $Result;
    private $Read;
    
    private $Conn;
    
    public function ExeRead($Tabela, $Termos = null, $ParseString = null) {
        if(!empty($ParseString)){
            parse_str($ParseString, $this->Places);
        }
        
        $this->Select = "SELECT * FROM {$Tabela} {$Termos}";
        $this->Execute();
    }

    public function getProduto($Termos = null) {
        if(empty($Termos)):
            $Termos = '';
        endif;
        $this->Select = 'SELECT p.id as id_produto, p.nome as nomeProduto, p.id_categoria, p.slug, p.valor, c.nome as categoria, p.descricao, p.peso, p.altura, p.largura, p.comprimento, p.quantidade FROM produtos p inner join categorias c on c.id = p.id_categoria '.$Termos;
        $this->ExecuteSQL();
    } 

    public function getProdutoPedido($Termos = null) {
        if(empty($Termos)):
            $Termos = '';
        endif;
        $this->Select = 'SELECT p.id as id_produto_pedido, p.id_pedido, p.id_produto, pd.nome as produto, p.quantidade, pd.valor, (pd.valor*p.quantidade) as total FROM produtos_pedido p join produtos pd on pd.id = p.id_produto '.$Termos;
        $this->ExecuteSQL();
    } 
    
    public function getResult() {
        return $this->Result;        
    }
    
    public function getRowCount(){
        return $this->Read->rowCount();
    }
    
    private function Connect() {
        $this->Conn = parent::getConn();
        $this->Read = $this->Conn->prepare($this->Select);
        $this->Read->setFetchMode(PDO::FETCH_ASSOC);
    }
    
    private function getSyntax() {
        if($this->Places):
            foreach ($this->Places as $Vinculo => $Valor):
                if($Vinculo == 'limit' || $Vinculo == 'offset'):
                    $Valor = (int)$Valor;
                endif;
                $this->Read->bindValue(":{$Vinculo}", $Valor, (is_int($Valor)? PDO::PARAM_INT : PDO::PARAM_STR));
            endforeach;
        endif;
    }
    
    private function Execute() {
        $this->Connect();
        try {
            $this->getSyntax();
            $this->Read->execute();
            $this->Result = $this->Read->fetchAll();
        } catch (PDOException $e) {
            $this->Result = null;
            echo 'Message: ' .$e->getMessage();            
        }
    }
    
    private function ExecuteSQl() {
        $this->Connect();
        try {
            $this->Read->execute();
            $this->Result = $this->Read->fetchAll();
        } catch (PDOException $e) {
            $this->Result = null;
            echo 'Message: ' .$e->getMessage();            
        }
    }
    
}
