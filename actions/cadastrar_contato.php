<?php

// Verificar se a página está sendo carregada por POST:
    if($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_SESSION['dados'])){
        // Importar a classe:
        require_once('../classes/Contato.class.php');

        // Instanciar um obj do tipo contato:
        $c = new Contato();

        // Definir os valores das suas propriedades:
        $c->nome = $_POST['nome'];
        $c->telefone = $_POST['telefone'];
        $c->email = $_POST['email'];

        $c->Inserir();

        // echo "Contato cadastrado com sucesso!";
        // Redirecionar o jovem de volta à agenda:
        header('Location: ../agenda.php');
        exit();
    }else{
        echo "Essa página deve ser carregada por POST!";
    }


?>