<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamados</title>
    <link rel="stylesheet" href="../estilo/style.css">
    <?php 
        require_once "../model/buscaChamado.php";
    ?>
</head>
<body>
    <div>   <!-- div para a parte de pesquisa dos chamados-->
        <h2>Chamados</h2>
        <form action="telaTecnico.php" method="GET">
        <h3>Buscar chamado</h3>
            Código do chamado:
            <input type="hidden", name="cxCodUsuario" value=3>
            <input type="hidden", name="nivelAcesso" value=2>
            <input type="number" name="cxCodChamado" placeholder="0">
            <input type="submit" value="Buscar">
            <input type="reset" value="Limpar busca" onclick="window.location.href = 'telaTecnico.php?cxCodUsuario=3&cxCodChamado=-1&nivelAcesso=2';">
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
                <a class="excluir" href="../model/deletaChamado.php?cxCodChamado=<?=$chamado["codChamado"]?>&cxCodUsuario=<?=$_GET["cxCodUsuario"]?>">Encerrar chamado</a>
                <a class="responder">Ver / Responder chamado</a>
            </div>
            <br>
        <?php endforeach ;?>
        

    </div>
</body>
</html>