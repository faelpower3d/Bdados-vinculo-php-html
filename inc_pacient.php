<?php
        session_start();    
        $nome = $_POST["nome"];
        $endereco = $_POST["endereco"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $cpf = $_POST["cpf"];
        $rg = $_POST["rg"];
        $telefone = $_POST["telefone"];
        $celular = $_POST["celular"];        
        $email = $_POST["email"];
        $telefones= $_POST["telefones"];

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        include ("clinica.php");
        mysqli_begin_transaction($con) or die (mysqli_connect_error());

        try {
        $query = "INSERT INTO  paciente(nome,endereco,numero,complemento,
        bairro,cidade,estado,cpf,rg,telefone,celular,email)
        VALUES ('$nome','$endereco','$numero','$complemento',
        '$bairro','$cidade','$estado','$cpf','$rg','$telefone','$celular','$email')";
        $result = mysqli_query($con, $query);
        $id_paciente=mysqli_insert_id($con);
        foreach ($telefones as $tel ) {
            $query_tel = "INSERT INTO telefone (numero,id_paciente) VALUES ('$tel','$id_paciente')";
            $resul=mysqli_query($con, $query_tel); 
        }
    

        mysqli_commit($con);
        $_SESSION['msg'] = "<p style=color:green;'>Paciente cadastrado </p>";
        header("Location: index_pacient.php");
    }catch (mysqli_sql_exception $exception) {
        mysqli_rollback($con);        
        $_SESSION['msg'] = "<p style='color:green;'>Paciente NÃO cadastrado </p>";
        header("Location: index_pacient.php");
        throw $exception;

    }
    mysqli_close($con);     
   
    ?>