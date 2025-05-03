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
       bindParam(':emailClienteChamado',$_POST['cxEmailCliente'],PDO::PARAM_INT);
       $cadastrar->execute();
       
       if($cadastrar->rowcount()){
           echo "Chamado feito com sucesso!";
       }else{
           echo "Chamado não realizado";
       }
    }else{
        echo "Dados incompleto";
    }
?>