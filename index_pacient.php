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
    if (isset($_SESSION['msg'])){
        echo '<p>' . $_SESSION['msg'] . '</p>';
        unset($_SESSION['msg']);
    }
    ?>
    <form method="post" action="inc_pacient.php">
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