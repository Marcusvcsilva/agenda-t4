<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once('../classes/usuario.class.php');
    $u = new Usuario();
    $u->email = $_POST['email'];
    $u->senha = $_POST['senha'];

    $resultado = $u->Logar();
    // Verificar se existem linhas no resultado:
        if(count($resultado) == 1){
            session_start();
            $_SESSION['dados'] = $resultado[0];
            header("Location: ../agenda.php");
            exit();
        }else{
            //echo "Usuário ou senha inválidos!"; 
            header('Location: ../login.php?erro=0');
            exit();
        }
} else {
    echo "A página deve ser carregada POST";
}
?>