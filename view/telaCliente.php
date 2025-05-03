<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer um chamado</title>
</head>
<body>
    <div>
        <h2>Criar chamado</h2>
        <form action="../model/criaChamado.php?cxCodCliente=1" method="POST">
            E-mail para resposta:
            <input type="text" name="cxEmailCliente" maxlength=50>
            Assunto:
            <input type="text" name="cxTituloChamado" maxlength=50>
            Descreva seu problema:
            <input type="text" name="cxDescrChamado" maxlength=200>
            <input type="submit" value="Abrir chamado">
        </form>
    </div>
    <div>
        <h2>Meus Chamados</h2>
    </div>
</body>
</html>