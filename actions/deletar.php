<?php
session_start();

if(isset($_GET['id']) and isset($_SESSION['dados'])){
    require_once('../classes/Contato.class.php');
    $c = new Contato();
    
    $c->id = $_GET['id'];
    
    if ($c->Deletar() == 1){
         header("Location: ../agenda.php");
         exit();
    }else{
        echo "ID não encontrado!";
    }
}else{
    echo "Defina o ID do item a ser apagado ou faça o login na sua conta";
}


?>