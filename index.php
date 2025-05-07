<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GaMa Peças</title>
    <?php
        require_once "factory/conexao.php";
        session_abort();
    ?>
    <link rel="stylesheet" href="estilo/style.css">
</head>
<body>
    <div class="inicio-container">
        <div class="inicio-card">
            <h1>Escolha seu usuário</h1>
            <div class="inicio-botoes">
                <a class="users" href="view/telaCliente.php?cxCodChamado=-1">Cliente</a>
                <a class="users" href="view/telaTecnico.php?cxCodChamado=-1">Técnico</a>
            </div>
        </div>
    </div>
</body>
</html>
