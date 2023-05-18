<?php

$msg = [
    "Cadastro realizado com sucesso!",
    "Contato cadastrado com sucesso!",
    "Contato excluido com sucesso!",
    "Contato atualizado com sucesso!",
];

$erro = [
    "Usuario e/ou senha invalidos!",
    "Falha ao realizar seu cadastro, verifique as informações digitadas",
    "Falha ao cadastrar contato",
    "Falha ao exluir contato",
    "Falha ao modificar contato"
];
?>




<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    <?php if (isset($_GET['erro'])) { ?>
        swal("Erro!", "<?= $erro[$_GET['erro']]; ?>", "error");
    <?php } ?>
    <?php if (isset($_GET['msg'])) { ?>
        swal("Sucesso!", "<?= $msg[$_GET['msg']]; ?>", "success");
    // Remover parametro da url
    window.history.replaceState(null, null, window.location.pathname);
    <?php } ?>
</script>