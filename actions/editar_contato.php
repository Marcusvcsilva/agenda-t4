<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

require_once('../classes/Contato.class.php');

$c = new Contato(); 

$c->id = $_POST['id'];
$c->nome = $_POST['nome'];
$c->email = $_POST['email'];
$c->telefone = $_POST['telefone']; 

if($c->Atualizar() == 1){
    // Deu Certo!
    // Redirecionar:
    header('Location: ../agenda.php');
}else{
    echo "Falha ao modificar.";
}
} else{
    echo "A página deve ser carregada por POST . <br>";
    echo "<a href=\"../agenda.php\">Voltar</a>";
}

?>