<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    // Validação de brincadeirinha
    if($email == 'r@a.com' and $senha == '123'){
        session_start();
        $_SESSION['dados'] = [$email, $senha];
        header('Location: ../agenda.php');
        exit();
    }else{
            echo "Email ou senha incorretas";
    }
}else{
    echo "A página deve ser carregada POST";
}
?> 