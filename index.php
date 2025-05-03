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
    Você é um cliente ou técnico?
    <a href="view/telaCliente.php?cxCodCliente=1">Cliente</a>
    <a href="view/telaTecnico.php">Técnico</a>
</div>
</body>
</html>