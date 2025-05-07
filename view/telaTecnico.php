<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamados</title>
    <link rel="stylesheet" href="../estilo/style.css">
    <?php 
        session_start();
        $_SESSION['cxCodUsuario'] = 3;
        $_SESSION['nivelAcesso'] = 2;
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
            <?php 
                $procuraUser = $chamado['codUsuarioChamado'];
                include '../model/buscaUsuario.php';?>
            <div> <!-- div para cada chamado-->
                <!-- aqui dentro vai a estrutura de um chamadp-->
                <h4>"<?= $chamado["titleChamado"]?>" <!-- CAMPO TÍTULO/ASSUNTO DO CHAMADO --> por <?=$linhaUsuario['nomeUsuario']?>- código: <?=$chamado["codChamado"]?> <!-- CAMPO CÓDIGO DO CHAMADO --></h4>
                <p>Criado em: <?= $chamado["dataCriacaoChamado"]?><!-- CAMPO DATA DE ABERTURA DO CHAMADO --></p>
                <p><?= $chamado["descrChamado"]?><!-- CAMPO TEXTO/DESCRIÇÃO DO CHAMADO --></p>
                Responder para: <?php 
                if($chamado['emailUsuarioChamado'] != ""){
                    echo $chamado["emailUsuarioChamado"];
                }else{
                    echo $linhaUsuario['emailUsuario'];
                } ?>
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
                <a class="excluir" href="../model/deletaChamado.php?cxCodChamado=<?=$chamado["codChamado"]?>">Encerrar chamado</a>
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