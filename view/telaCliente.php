<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer um chamado</title>
    <?php 
        require_once "../model/buscaChamado.php";
    ?>
</head>
<body>
    <div>   <!-- div para a parte de abertura de chamado-->
        <form action="../model/criaChamado.php?cxCodCliente=1" method="POST">
            <h2>Criar chamado</h2>
            E-mail para resposta:
            <input type="text" name="cxEmailCliente" maxlength=50>
            Assunto:
            <input type="text" name="cxTituloChamado" maxlength=50>
            Descreva seu problema:
            <input type="text" name="cxDescrChamado" maxlength=200>
            <input type="submit" value="Abrir chamado">
        </form>
    </div>
    <div>   <!-- div para a parte de pesquisa dos chamados-->
        <h2>Meus Chamados</h2>
        <form action="telaCLiente.php?cxCodCliente=1" method="GET">
        <h3>Buscar chamado</h3>
            Código do chamado:
            <input type="hidden", name="cxCodCliente" value=1>
            <input type="number" name="cxCodChamado" placeholder="0">
            <input type="submit" value="Buscar">
            <input type="reset" value="Limpar busca" onclick="window.location.href = 'telaCliente.php?cxCodCliente=1&cxCodChamado=-1';">
        </form>
        <br>
        <br>
        <br>
        
        <?php foreach($linha as $indice => $chamado):?>
            <div> <!-- div para cada chamado-->
                <!-- aqui dentro vai a estrutura de um chamadp-->
                <h4><?= $chamado["titleChamado"]?> <!-- CAMPO TÍTULO/ASSUNTO DO CHAMADO --> - código: <?=$chamado["codChamado"]?> <!-- CAMPO CÓDIGO DO CHAMADO --></h4>
                <p>Criado em: <?= $chamado["dataCriacaoChamado"]?><!-- CAMPO DATA DE ABERTURA DO CHAMADO --></p>
                <p><?= $chamado["descrChamado"]?><!-- CAMPO TEXTO/DESCRIÇÃO DO CHAMADO --></p>
                <nav>
                    <?php 
                        switch($chamado["statusChamado"]){
                            case 1:
                                echo "Pendente";
                                break;
                            case 2:
                                echo "Respondido";
                                break;
                            case 3:
                                echo "Encerrado";
                                break;
                        }
                    ?><!-- CAMPO STATUS DO CHAMADO --></nav>
                <nav>Última atualização: <?=$chamado["dataUltimaRespostaChamado"]?><!-- CAMPO DATA DA ÚLTIMA RESPOSTA DO CHAMADO --></nav>
                <a href="../model/deletaChamado.php?cxCodChamado=<?=$chamado["codChamado"]?>&cxCodCliente=<?=$_GET["cxCodCliente"]?>">Excluir chamado</a>
            </div>
            <br>
        <?php endforeach ;?>
        

    </div>
</body>
</html>