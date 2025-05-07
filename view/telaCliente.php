<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazer um chamado</title>
    <link rel="stylesheet" href="../estilo/style.css">
    <?php 
        session_start();
        $_SESSION['cxCodUsuario'] = 1;
        $_SESSION['nivelAcesso'] = 1;

        require_once "../model/buscaChamado.php";
        require_once "../model/buscaResposta.php";
        
    ?>
</head>
<body>
    <div>   <!-- div para a parte de abertura de chamado-->
        <form action="../model/criaChamado.php" method="POST">
            <input type="hidden", name="nivelAcesso" value=1>
            <input type="hidden", name="cxCodUsuario" value=1>
            <h2>Criar chamado</h2>
            E-mail para resposta:
            <input type="text" name="cxEmailUsuario" maxlength=50>
            Assunto:
            <input type="text" name="cxTituloChamado" maxlength=50 required>
            Descreva seu problema:
            <input type="text" name="cxDescrChamado" maxlength=200 required>
            <input type="submit" value="Abrir chamado">
        </form>
    </div>
    <div>   <!-- div para a parte de pesquisa dos chamados-->
        <h2>Meus Chamados</h2>
        <form action="telaCliente.php" method="GET">
        <h3>Buscar chamado</h3>
            Código do chamado:
            <input type="hidden", name="cxCodUsuario" value=1>
            <input type="hidden", name="nivelAcesso" value=1>
            <input type="number" name="cxCodChamado" placeholder="0">
            <input type="submit" value="Buscar">
            <input type="reset" value="Limpar busca" onclick="window.location.href = 'telaCliente.php?cxCodChamado=-1';">
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
                <?php 
                include "../model/buscaResposta.php";
                foreach($linhaRespostas as $indice => $resposta):
                    $procuraUser = $resposta["codRespondeu"];
                    include "../model/buscaUsuario.php";
                ?>
                    <div class="respostas-dropdown" id="chamado-<?=$chamado['codChamado']?>">
                        <?= $linhaUsuario['nomeUsuario']?> respondeu:
                        <p><?= $resposta['descrRespChamado'] ?></p>
                    </div>
                <?php endforeach;?>
                <div>
                        <form method="POST" action="../model/respChamado.php">
                            <input type="hidden" name="cxCodChamadoRespondido" value=<?=$chamado['codChamado']?>>
                            <input type="hidden" name="cxCodRespondeu" value=<?=$_SESSION['cxCodUsuario']?>>
                            Responder:
                            <input type="text" name="cxDescrRespoChamado">
                            <input type="submit" value="enviar">
                        </form>
                    </div>
            </div>
            <br>
        <?php endforeach ;?>
        

    </div>
</body>
</html>