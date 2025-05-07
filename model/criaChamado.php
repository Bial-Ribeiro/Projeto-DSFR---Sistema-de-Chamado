<?php
    require_once "../factory/conexao.php";
    
    if(($_POST['cxDescrChamado'] != "") && ($_POST['cxTituloChamado'] != "")){
       $conn = new Caminho;
       $query = "INSERT INTO tbChamado
       (titleChamado,   descrChamado,   statusChamado,  codUsuarioChamado,  emailUsuarioChamado,    dataCriacaoChamado)
       VALUES
       (:titleChamado,  :descrChamado,              1,  :codUsuarioChamado, :emailUsuarioChamado,   CURRENT_TIMESTAMP)"; 

       $criaChamado=$conn->getConn()->
       prepare($query);
       
       $criaChamado->bindParam(':titleChamado',$_POST['cxTituloChamado'],PDO::PARAM_STR);
       $criaChamado->bindParam(':descrChamado',$_POST['cxDescrChamado'],PDO::PARAM_STR);
       $criaChamado->bindParam(':codUsuarioChamado',$_POST['cxCodUsuario'],PDO::PARAM_INT);
       $criaChamado->bindParam(':emailUsuarioChamado',$_POST['cxEmailUsuario'],PDO::PARAM_STR);

       if($criaChamado->execute()){
        echo "
        <script>
            alert('Chamado criado com sucesso');
            window.location.href='../view/telaCliente.php?cxCodChamado=-1';
        </script>
        ";
    }else{
         echo "
             <script>
             alert('Chamado não criado');
             window.location.href='../view/telaCliente.php?cxCodChamado=-1';
             </script>
         ";
        }
    }else{
        echo "Dados incompleto";
    }
?>