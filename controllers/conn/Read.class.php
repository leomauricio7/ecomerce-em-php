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

    public function consulta_materia($Termos = null) {
        if(empty($Termos)):
            $Termos = '';
        endif;
        $this->Select = 'SELECT m.id, m.situacao, m.data_create as data,  m.titulo, m.responsavel, m.horario, m.entidade, p.poder as nomePoder, m.file as file FROM materias_solicitadas m INNER JOIN poder p ON m.poder = p.id_poder '.$Termos;
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
