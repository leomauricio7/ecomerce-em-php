<?php 
if($_POST){
    if(!$_SESSION['logado']){

        echo '<script>window.location.href="./login"</script>';
    }
}
?>