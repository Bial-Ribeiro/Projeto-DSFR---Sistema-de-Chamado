<?php
    require_once "../factory/conexao.php";
    session_start();
      $conn = new Caminho;

        $query = "DELETE FROM tbResposta WHERE codChamadoRespondido = :cxCodChamado";
        $deletaResp = $conn->getConn()->prepare($query);
        $deletaResp->bindParam(':cxCodChamado',$_GET['cxCodChamado'],PDO::PARAM_INT);

        if($_SESSION['nivelAcesso'] == 1){
        $query = "DELETE FROM tbChamado WHERE codChamado = :cxCodChamado AND codUsuarioChamado = :cxCodUsuario";
        $deleta->bindParam(':cxCodChamado',$_GET['cxCodChamado'],PDO::PARAM_INT);
        $deleta->bindParam(':cxCodUsuario',$_SESSION['cxCodUsuario'],PDO::PARAM_INT);    
        }else{
        $query = "DELETE FROM tbChamado WHERE codChamado = :cxCodChamado";
        $deleta = $conn->getConn()->prepare($query);
        $deleta->bindParam(':cxCodChamado',$_GET['cxCodChamado'],PDO::PARAM_INT);
        }
        $deletaResp->execute();
        if($deleta->execute()){
            if($_SESSION['nivelAcesso'] == 1)
            echo "
            <script>
                alert('Chamado encerrado com sucesso');
                window.location.href='../view/telaCliente.php?cxCodChamado=-1';
            </script>
            ";
            else
            echo "
            <script>
                alert('Chamado encerrado com sucesso');
                window.location.href='../view/telaTecnico.php?cxCodChamado=-1';
            </script>
            ";
        }else{
            if($_SESSION['nivelAcesso'] == 1)
             echo "
                 <script>
                 alert('Chamado não encerrado');
                 window.location.href='../view/telaTecnico.php?cxCodChamado=-1';
                 </script>
             ";
             else
             echo "
             <script>
             alert('Chamado não encerrado');
             window.location.href='../view/telaTecnico.php?cxCodChamado=-1';
             </script>
         ";
        }
?>