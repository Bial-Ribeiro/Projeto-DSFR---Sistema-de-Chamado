<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GaMa Peças</title>
    <?php
    require_once "factory/conexao.php";
    ?>
</head>
<body>
<div>
    Escolha seu usuário
    <a href="view/telaCliente.php?cxCodUsuario=1&cxCodChamado=-1&nivelAcesso=1">Cliente</a>
    <a href="view/telaTecnico.php?cxCodUsuario=3&cxCodChamado=-1&nivelAcesso=2">Técnico</a>
</div>
</body>
</html>