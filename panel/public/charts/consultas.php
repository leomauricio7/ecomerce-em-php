<?php 
require_once('../../controllers/init.inc');
require_once('../../vendor/autolaod.php');
$read = new Read();
$read->ExeRead('produtos');
var_dump($read->getResult());
exit;
?>