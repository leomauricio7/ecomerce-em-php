<?php 
require_once('../init.inc');
require_once('../../vendor/autoload.php');
if(!$_SESSION['logado']){
    return json_encoded([success=>'usuário não esta logado']);
}

?>