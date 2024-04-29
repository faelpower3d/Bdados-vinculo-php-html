<!DOCTYPE html>
<head>
    <meta charset="UTF-8">   
    <title>Paciente</title>

    <script>
        function addTel(){
            var divTel =document.getElementById("telefones");
            var input =document.createElement("input");
            input.type="tel";
            input.name="telefones[]";
            input.placeholder="(XX) XXXX-XXXX";
            divTel.appendChild(input);            
        }
    </script>
</head>
<body>
    <p><h1>Paciente - Inclusão</h1>
    <?php
    //Verifica se o Formulario foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        include ("clinica.php");
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

    } catch (mysqli_sql_exception $exeption) {
        mysqli_rollback($con);

        throw $exeption;
        $_SESSION['msg'] = "<p style=color:green;'>Paciente NÃO cadastrado </p>";
        header("Location: index_pacient.php");

    }


        if (mysqli_insert_id($con)) {
            echo "Inclusão realizada com sucesso ! !";
        }else{
            echo "ERRO AO INSERIR OS DADOS : ".mysqli_connect_error();
        }

        mysqli_close($con);        
    
   
    ?>
    <form method="post">
    <label> Nome: </label>
        <input type="text" size="80" maxlength="100" name="nome" required>
        
        <br><label> Endereço: </label>
        <input type="text" size="80" maxlength="100" name="endereco" required>
        <label> Número: </label>
        <input type="number" maxlength="10" name="numero" required>
        <label> Complemento: </label>
        <input type="text" size="60" maxlength="60" name="complemento" required>
        <label> Bairro: </label>
        <input type="text" size="60" maxlength="60" name="bairro" required>
        <label> Cidade: </label>
        <input type="text" size="40" maxlength="80" name="cidade" required>
        <label> Estado: </label>        
        <select name="estado">
            <option value="SP">SP</option>
            <option value="MG">MG</option>
            <option value="PR">PR</option>
            <option value="RJ">RJ</option> </select>   
        <label> CPF :</label>
        <input type="text" size="11" maxlength="11" name="cpf" required>     
        <label> RG :</label>
        <input type="text" size="9" maxlength="9" name="rg" required>           
        <label> Telefone: </label>
        <input type="tel" maxlength="15" name="telefone" placeholder="(XX)XXXX-XXXX" required>
        <label> Celular: </label>
        <input type="tel" maxlength="15" name="celular" placeholder="(XX)XXXXX-XXXX" required>
        <label> e-mail: </label>
        <input type="email" size="40" maxlength="80" name="email" required>
        </select>

        <fieldset>
            <legend>TELEFONES</legend>

            <div id="telefones">
                <label for="tel_1">Telefone 1:</label>
                <input type="tel" name="telefones[]" placeholder = "(XX) XXXX-XXXX">                
            </div>
            <button type="button" onclick="addTel()" >Adicionar telefone</button>

        </fieldset>
        <p><input type="submit" value="Enviar"> <input type="reset" value="Limpar">
    </form>
    <a href="./index.html"><button>Voltar</button></a>
        
        

    
</body>
</html>