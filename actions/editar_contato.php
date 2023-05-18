<?php

session_start(); 

if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION['dados'])){

require_once('../classes/Contato.class.php');

$c = new Contato(); 

$c->id = $_POST['id'];
$c->nome = $_POST['nome'];
$c->email = $_POST['email'];
$c->telefone = $_POST['telefone']; 

if($c->Atualizar() == 1){
    // Deu Certo!
    // Redirecionar:
    header('Location: ../agenda.php?msg=3');
    exit();
}else{
    header('Location: ../agenda.php?erro=4');
    exit();
}
} else{
    echo "A página deve ser carregada por POST . <br>";
    echo "<a href=\"../agenda.php\">Voltar</a>";
}

?>