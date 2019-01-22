<?php

class Validation extends Conn {

    private $login;
    private $senha;

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function logar() {
        $pdo = parent::getConn();

        $logar = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
        $logar->bindValue(1, $this->getLogin());
        $logar->bindValue(2, $this->getSenha());
        $logar->execute();
        if ($logar->rowCount() == 1):
            $dados = $logar->fetch(PDO::FETCH_ASSOC);
            if($dados['id_situacao'] == 1):
               $_SESSION['user'] = $dados['nome'];
                $_SESSION['usuario'] = $dados['usuario'];
                $_SESSION['senha'] = $dados['senha'];
                $_SESSION['permisao'] = $dados['permisao'];
                $_SESSION['tipo'] = $dados['id_tipo'];
                $_SESSION['logado'] = true;
                $_SESSION["sessiontime"] = time() + 60 * 00;
                return true; 
            else:
                $_SESSION['erro'] = '<div class="alert alert-danger"><h5 align="center"><i class="fa fa-warning"></i> Usuário desativado! procure o setor de administração do sistema para resolver esse problema.</h5></div>';
                return false;
            endif; 
        else:
            $_SESSION['erro'] = '<div class="alert alert-danger"><h5 align="center"><i class="fa fa-warning"></i> Usuário ou senha incorretos.</h5></div>';
            return false;
        endif;
    }

    public static function deslogar() {
        if (isset($_SESSION['logado'])):
            unset($_SESSION['logado']);
            session_destroy();
            echo '<script>window.location.href="../login";</script>';
        endif;
    }
    public static function deslogarEX() {
        if (isset($_SESSION['logado'])):
            unset($_SESSION['logado']);
            session_destroy();
            echo '<script>window.location.href="../../login";</script>';
        endif;
    }

    public static function validaSession() {
        if (!isset($_SESSION['logado'])):
            $_SESSION['erro'] = '<div class="alert alert-danger"><i class="fa fa-warning"></i> Area restrita para usuários cadastrados.</div>';
            echo '<script>window.location.href="../login";</script>';
        else:
            $pdo = parent::getConn();
            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
            $sql->bindValue(1, $_SESSION['usuario']);
            $sql->bindValue(2, $_SESSION['senha']);
            $sql->execute();
            if ($sql->rowCount() == 0):
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                unset($_SESSION['logado']);
                unset($_SESSION['permisao']);
                unset($_SESSION['tipo']);
                unset($_SESSION['user']);
                $_SESSION['erro'] = '<div class="alert alert-danger"><i class="fa fa-warning"></i> Area restrita para usuários cadastrados.</div>';
                echo '<script>window.location.href="../login";</script>';
            endif;
        endif;
    }
        public static function validaSessionEX() {
        if (!isset($_SESSION['logado'])):
            $_SESSION['erro'] = '<div class="alert alert-danger"><i class="fa fa-warning"></i> Area restrita para usuários cadastrados.</div>';
            echo '<script>window.location.href="../login";</script>';
        else:
            $pdo = parent::getConn();
            $sql = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
            $sql->bindValue(1, $_SESSION['usuario']);
            $sql->bindValue(2, $_SESSION['senha']);
            $sql->execute();
            if ($sql->rowCount() == 0):
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                unset($_SESSION['logado']);
                unset($_SESSION['permisao']);
                unset($_SESSION['tipo']);
                unset($_SESSION['user']);
                $_SESSION['erro'] = '<div class="alert alert-danger"><i class="fa fa-warning"></i> Area restrita para usuários cadastrados.</div>';
                echo '<script>window.location.href="../login";</script>';
            endif;
        endif;
    }

        public static function expiraSession() {
        if (isset($_SESSION["sessiontime"])) {
            if ($_SESSION["sessiontime"] < time()) {
                session_unset();
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                unset($_SESSION['permisao']);
                unset($_SESSION['tipo']);
                unset($_SESSION['logado']);
                unset($_SESSION['user']);
                $_SESSION['erro'] = '<div class="alert alert-danger"><i class="fa fa-warning"></i> Sua sessão expirou!</div>';
                echo '<script>window.location.href="../../login";</script>';
            } else {
                $_SESSION["sessiontime"] = time() + 60 * 10;
            }
        } else {
            session_unset();
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            unset($_SESSION['logado']);
            unset($_SESSION['permisao']);
            unset($_SESSION['tipo']);
            unset($_SESSION['user']);
            $_SESSION['erro'] = '<div class="alert alert-danger"><i class="fa fa-warning"></i> Sua sessão expirou!</div>';
            echo '<script>window.location.href="../login";</script>';
        }
    }
    
    public static function expiraSessionEX() {
        if (isset($_SESSION["sessiontime"])) {
            if ($_SESSION["sessiontime"] < time()) {
                session_unset();
                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                unset($_SESSION['permisao']);
                unset($_SESSION['tipo']);
                unset($_SESSION['logado']);
                unset($_SESSION['user']);
                $_SESSION['erro'] = '<div class="alert alert-danger"><i class="fa fa-warning"></i> Sua sessão expirou!</div>';
                echo '<script>window.location.href="../../login";</script>';
            } else {
                $_SESSION["sessiontime"] = time() + 60 * 10;
            }
        } else {
            session_unset();
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            unset($_SESSION['logado']);
            unset($_SESSION['permisao']);
            unset($_SESSION['tipo']);
            unset($_SESSION['user']);
            $_SESSION['erro'] = '<div class="alert alert-danger"><i class="fa fa-warning"></i> Sua sessão expirou!</div>';
            echo '<script>window.location.href="../../login";</script>';
        }
    }

    public static function getMes($mes) {
        $nome_mes = null;
        switch ($mes) {
            case 1: $nome_mes = 'Jan';break;
            case 2: $nome_mes = 'Fev';break;
            case 3: $nome_mes = 'Mar';break;
            case 4: $nome_mes = 'Abr';break;
            case 5: $nome_mes = 'Mai';break;
            case 6: $nome_mes = 'Jun';break;
            case 7: $nome_mes = 'Jul';break;
            case 8: $nome_mes = 'Ago';break;
            case 9: $nome_mes = 'Set';break;
            case 10: $nome_mes = 'Out';break;
            case 11: $nome_mes = 'Nov';break;
            case 12: $nome_mes = 'Dez';break;
            default: $nome_mes = 'NC';break;
        }
        return $nome_mes;
    }

    public static function getSituacao($id) {
        $situacao = null;
        switch ($id) {
            case 1: $situacao = 'Ativo';break;
            case 2: $situacao = 'Inativo';break;
            default: $situacao = 'NC';break;
        }
        return $situacao;
    }
    
    public static function getTipo($id) {
        $tipo = null;
        switch ($id) {
            case 1: $tipo = 'Master';break;
            case 2: $tipo = 'Executivo';break;
            case 3: $tipo = 'Legislativo';break;
            case 4: $tipo = 'Indústria e Comércio';break;
            default: $tipo = 'NC';break;
        }
        return $tipo;
    }
    
    public static function nRomano($numero) {
        if ($numero <= 0 || $numero > 3999) {
            return $numero;
        }

        $n = (int)$numero;
        $y = '';

        // Nivel 1
        while (($n / 1000) >= 1) {
            $y .= 'M';
            $n -= 1000;
        }
        if (($n / 900) >= 1) {
            $y .= 'CM';
            $n -= 900;
        }
        if (($n / 500) >= 1) {
            $y .= 'D';
            $n -= 500;
        }
        if (($n / 400) >= 1) {
            $y .= 'CD';
            $n -= 400;
        }

        // Nivel 2
        while (($n / 100) >= 1) {
            $y .= 'C';
            $n -= 100;
        }
        if (($n / 90) >= 1) {
            $y .= 'XC';
            $n -= 90;
        }
        if (($n / 50) >= 1) {
            $y .= 'L';
            $n -= 50;
        }
        if (($n / 40) >= 1) {
            $y .= 'XL';
            $n -= 40;
        }

        // Nivel 3
        while (($n / 10) >= 1) {
            $y .= 'X';
            $n -= 10;
        }
        if (($n / 9) >= 1) {
            $y .= 'IX';
            $n -= 9;
        }
        if (($n / 5) >= 1) {
            $y .= 'V';
            $n -= 5;
        }
        if (($n / 4) >= 1) {
            $y .= 'IV';
            $n -= 4;
        }

        // Nivel 4
        while ($n >= 1) {
            $y .= 'I';
            $n -= 1;
        }
        return $y;
    }
}
