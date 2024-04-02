<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8"> 
<title>Cadastro de Especialidades Médicas</title> 
</head> 
<body> 
<h1>Exclusão</h1> 
<?php 
// Verifica se o ID foi passado via GET 
if (isset($_GET['id'])) { 
include('clinica.php'); 
$id = $_GET['id'];
 
// Consulta SQL para obter os dados da especialidade com o ID especificaco 
$query = "SELECT FROM especialidade WHERE id = $id"; 
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
 
// Verifica se existe uma especialidade com o ID especificado 
if ($row) { 
    // Exibe os detalhes da especialidade 
    echo "<p>ID:".$row['id']."</p>";    
    echo "<p>Descrição: " .$row['descricao']."</p>"; 
    echo "<p>Sigla:". $row['sigla']."</p>"; 
    echo "<p>Confirma a exclusão?</p>"; 
    echo "<form method='POST'>"; 
    echo "<input type='hidden' name='id' value='" .$row['id'] . "'>";
    echo "<input type='submit' name='confirmar' value='Sim'>"; 
    echo "<input type='submit' name='cancelar' value='Não'>"; 
    echo "</form>"; 
    }else {
        echo "Especialidade não encontrada."; 
    } 
    // Fecha a conexão com o banco de dados 
    mysqli_close($con);
    }else {
        echo "ID da especialidade não especificado."; 
    }
?>
 
<?php
 
// Verifica se o formulário foi submetido 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmar'])) { 
    include('clinica.php');

    // Prepara o ID para exclusão 
    $id = $_POST["id"]; 

// Consulta SQL para excluir a especialidade 
$query = "DELETE FROM especialidade WHERE id = $id"; 

// Executa a consulta SQL 
$result = mysqli_query($con, $query);

// Verifica se a exclusão foi bem-sucedida 
if ($result) {
 
    echo "Especialidade excluída com sucesso!";     
    } else { 
    echo "ERRO ao excluir a especialidade:" .mysqli_error($con);     
    }
     
    // Fecha a conexão com o banco de dados
     
    mysqli_close($con);
     
    header("Location: consulta especialidade.php");
     
    } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])) {     
    // Redireciona de volta para a página inicial se o usuário cancelar a exclusão header("Location: consulta_especialidade.php");
    exit;     
    }     
    ?>
     
</body>
     
</html>