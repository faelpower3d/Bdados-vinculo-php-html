<?php
    include("../clinica.php");
    $pesq_1 = $_POST['nome'];
    $pesq_2 = $_POST['cpf'];
?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado da pesquisa</title>
</head>
<body>
    <h2><p align="center">CONSULTA DE PACIENTES</h2>
    <table border="1" width="100%">
        <tr>
            <th>NOME</th>
            <th>CPF</th>
            <th>RG</th>
            <th>ENDEREÇO</th>
            <th>NUMERO</th>
            <th>BAIRRO</th>
            <th>CIDADE</th>
            <th>ESTADO</th>
            <th>E-MAIL</th>
        </tr>
 
        <?php
            if (empty($pesq_1) && (empty($pesq_2))) {
                $sql = "SELECT * FROM paciente ORDER BY nome";
            } elseif (!empty($pesq_1) && (empty($pesq_2))) {
                $sql = "SELECT * FROM paciente WHERE nome like '%$pesq_1%' ORDER BY nome";
            } elseif (empty($pesq_1) && (!empty($pesq_2))) {
                $sql = "SELECT * FROM paciente WHERE cpf = '$pesq_2' ORDER BY nome";
            } else {
                $sql = "SELECT * FROM paciente WHERE nome like '%$pesq_1%' or cpf = '$pesq_2' ORDER BY nome";
            }
            $resultado = mysqli_query($con, $sql) or die("Erro ao retornar dados");
 
        // Obtendo os dados por meio de um loop while
        while ($registro = mysqli_fetch_array($resultado)) {
            $nome = $registro['nome'];
            $cpf = $registro['cpf'];
            $rg = $registro['rg'];
            $endereco = $registro['endereco'];
            $numero = $registro['numero'];
            $cidade = $registro['cidade'];
            $estado = $registro['estado'];
            $bairro = $registro['bairro'];
            $email = $registro['email'];
 
            echo "<tr>";
            echo "<td>".$nome."</td>";
            echo "<td>".$cpf."</td>";
            echo "<td>".$rg."</td>";
            echo "<td>".$endereco."</td>";
            echo "<td>".$numero."</td>";
            echo "<td>".$bairro."</td>";
            echo "<td>".$cidade."</td>";
            echo "<td>".$estado."</td>";
            echo "<td>".$email."</td>";
            echo "</tr>";
        }
        mysqli_close($con);
        echo "</table>";
        ?>
        <br><a href="consulta_paciente.php">Voltar</a><br>
    </body>
</html>