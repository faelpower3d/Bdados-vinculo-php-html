<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de especialidade</title>
</head>
<body>
    <h1>INCLUSÃO</h1>
    <?php
    // VERIFICAR SE O FORMULARIO FOI SUBMETIDO
    if ($_SERVER["REQUEST_METHOD"]==="POST"){
        include ("conexao.php");
 
        //prepara os dados para inserção
        $nome = $_POST["nome"];
        $sigla = $_POST["sigla"];
 
        // prepara a consulta SQL para inserção de dados
        $query = "INSERT INTO especialidade (descricao,sigla)
                    VALUES ('$nome','$sigla')";
        // executa a consulta sql
        $resu= mysqli_query($con,$query);
        // veerifica se conseguiu inserir o registro
        if (mysqli_insert_id($con)) {
            echo "inclusão realizada com sucesso!";
        } else {
            echo "ERRO ao inseirir os dados:".mysqli_connect_error();
        }
        // Fecha conexão com o banco de dados
        mysqli_close($con);
    }
    ?>
    <form method="POST">
          <label>Descricao da especialidade:</lavel>
          <input type="text" name="nome" size="100" maxlenght="100" required>
          <p><label>Sigla:</label>
          <input type="text" name="sigla" size="3" maxlenght="3" required>
          <p><input type="submit" value="Enviar">
             <input type="reset" value="Limpar">
    </form>
</body>
</html>