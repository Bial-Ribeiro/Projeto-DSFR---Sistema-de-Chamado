<?php
    require_once "../factory/conexao.php";
    session_start();
    if($_POST['cxDescrRespoChamado'] != ""){
       $conn = new Caminho;
       if($_SESSION['nivelAcesso'] == 1){
        $query = "INSERT INTO tbResposta(dataCriacaoRespChamado, descrRespChamado, codChamadoRespondido, codRespondeu)
        VALUES
        (CURRENT_TIMESTAMP,  :cxDescrRespChamado, :cxCodChamadoRespondido, :cxCodRespondeu);
        UPDATE tbChamado SET statusChamado = 1, dataUltimaRespostaChamado = CURRENT_TIMESTAMP WHERE codChamado = :cxCodChamadoRespondido"; 
       }else{
       $query = "INSERT INTO tbResposta(dataCriacaoRespChamado, descrRespChamado, codChamadoRespondido, codRespondeu)
       VALUES
       (CURRENT_TIMESTAMP,  :cxDescrRespChamado, :cxCodChamadoRespondido, :cxCodRespondeu);
       UPDATE tbChamado SET statusChamado = 2, dataUltimaRespostaChamado = CURRENT_TIMESTAMP WHERE codChamado = :cxCodChamadoRespondido"; 
       }
       $respChamado=$conn->getConn()->prepare($query);
    
       $respChamado->bindParam(':cxDescrRespChamado',$_POST['cxDescrRespoChamado'],PDO::PARAM_STR);
       $respChamado->bindParam(':cxCodChamadoRespondido',$_POST['cxCodChamadoRespondido'],PDO::PARAM_STR);
       $respChamado->bindParam(':cxCodRespondeu',$_POST['cxCodRespondeu'],PDO::PARAM_INT);

       if($respChamado->execute()){
        if($_SESSION['nivelAcesso'] == 1)
        echo "
        <script>
            alert('Chamado excluido com sucesso');
            window.location.href='../view/telaCliente.php?cxCodChamado=-1';
        </script>
        ";
        else
        echo "
        <script>
            alert('Chamado excluido com sucesso');
            window.location.href='../view/telaTecnico.php?cxCodChamado=-1';
        </script>
        ";
    }else{
        if($_SESSION['nivelAcesso'] == 1)
         echo "
             <script>
             alert('Chamado não excluido');
             window.location.href='../view/telaTecnico.php?cxCodChamado=-1';
             </script>
         ";
         else
         echo "
         <script>
         alert('Chamado não excluido');
         window.location.href='../view/telaTecnico.php?cxCodChamado=-1';
         </script>
     ";
        }
    }else{
        echo "Dados incompleto";
    }
?>