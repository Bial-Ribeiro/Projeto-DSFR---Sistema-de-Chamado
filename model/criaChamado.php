<?php
    require_once "../factory/conexao.php";
    
    if(($_POST['cxDescrChamado'] != "") && ($_POST['cxTituloChamado'] != "")){
       $conn = new Caminho;
       $query = "INSERT INTO tbChamado
       (titleChamado,   descrChamado,   statusChamado,  codClienteChamado,  emailClienteChamado,    dataCriacaoChamado)
       VALUES
       (:titleChamado,  :descrChamado,              1,  :codClienteChamado, :emailClienteChamado,   CURRENT_TIMESTAMP)"; 

       $cadastrar=$conn->getConn()->
       prepare($query);
       
       $cadastrar->
       bindParam(':titleChamado',$_POST['cxTituloChamado'],PDO::PARAM_STR);

       $cadastrar->
       bindParam(':descrChamado',$_POST['cxDescrChamado'],PDO::PARAM_STR);
       
       $cadastrar->
       bindParam(':codClienteChamado',$_GET['cxCodCliente'],PDO::PARAM_INT);
       
       $cadastrar->
       bindParam(':emailClienteChamado',$_POST['cxEmailCliente'],PDO::PARAM_STR);
       $codCliente = $_GET['cxCodCliente'];
       if($cadastrar->execute()){
        echo "
        <script>
            alert('Chamado criado com sucesso');
            window.location.href='../view/telaCliente.php?cxCodCliente=$codCliente&cxCodChamado=-1';
        </script>
        ";
    }else{
         echo "
             <script>
             alert('Chamado não criado');
             window.location.href='../view/telaCliente.php?cxCodCliente=$codCliente&cxCodChamado=-1';
             </script>
         ";
        }
    }else{
        echo "Dados incompleto";
    }
?>