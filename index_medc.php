<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
     <title>Cadastro de Medicos</title>
</head>
<body>
    <p><h1> Médicos - inclusão </h1>
    <?php
    //Verifica se o Formulario foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        include ("clinica.php");
        
        // Prepara os dados para inserção
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $endereco = $_POST["endereco"];
        $numero = $_POST["numero"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $crm = $_POST["crm"];
        $salario = $_POST["salario"];
        $celular = $_POST["celular"];
        $cod_esp = $_POST["cod_esp"];    
        $query = "INSERT INTO medico (nome,cpf,endereco,numero,bairro,cidade,
        estado,crm,salario,celular,cod_esp)
        VALUES ('$nome','$cpf','$endereco','$numero','$bairro','$cidade',
        '$estado','$crm','$salario','$celular','$cod_esp')";
         
         //Executa a consulta SQL
         $result = mysqli_query($con, $query);
         // verifica se conseguiu inserir o registro
         if (mysqli_insert_id($con)) {
            echo "Inclusão realizada com sucesso ! ! ";            
        }else{
            echo "ERRO ao inserir os dados :".mysqli_connect_error();
        }

        // fecha conexão com o banco
        mysqli_close($con);
    }
    ?>
    <form method="POST">
        <label> Nome: </label>
        <input type="text" size="80" maxlength="100" name="nome" required>
        <label> CPF :</label>
        <input type="text" size="11" maxlength="11" name="cpf" required>
        <br><label> Endereço: </label>
        <input type="text" size="80" maxlength="100" name="endereco" required>
        <label> Número: </label>
        <input type="number" maxlength="10" name="numero" required>
        <label> Bairro: </label>
        <input type="text" size="60" maxlength="60" name="bairro" required>
        <label> Cidade: </label>
        <input type="text" size="40" maxlength="80" name="cidade" required>
        <label> Estado: </label>
        <select name="estado">
            <option value="SP"> São Paulo </option>
            <option value="MG"> Minas Gerais </option>
            <option value="PR"> Paraná </option>
            <option value="RJ"> Rio de Janeiro  </option> </select>        
        
        <label> CRM  nº: </label>
        <input type="text" size="20" maxlength="20" name="crm" required>
        <label> Salario</label>
        <input type="number" min="0" max="50000" name="salario" required>
        <label> Celular: </label>
        <input type="tel" maxlength="15" name="celular" placeholder="(XX)XXXXX-XXXX" required>
        <label> Especialidade :</label>
        <select name="cod_esp" >
        <?php
        include ("clinica.php");
        $query = 'SELECT * FROM especialidade ORDER BY descricao;';
        $resu = mysqli_query($con, $query) or die (mysqli_connect_error());
        while ($reg = mysqli_fetch_array($resu)) {
        ?>
         <option value="<?php echo $reg ['id'];?>"> <?php echo $reg ['descricao'];?>
        </option>         
        <?php
        }
        mysqli_close($con);
        ?>
        </select>
        <p><input type="submit" value="Enviar"> <input type="reset" value="Limpar"> 
    </form>
    <a href="./index.html"><button>Voltar</button></a>
    
</body>
</html>