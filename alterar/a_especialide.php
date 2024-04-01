<!DOCTYPE html>
<html> 
    <head> 
    <meta charset="UTF-8"> 
    <title>Cadastro de Especialidades Médicas</title> 
    </head> 
        <body> 
        <h1>Alteração</h1> 
        <?php 
        // Verifica se o formulário foi submetido        
            if ($_SERVER ["REQUEST_METHOD"] == "POST" && isset($_POST['atualizar'])) { 
                include('../clinica.php');


            // Prepara os dados para atualização 
            $id = $_POST["id"]; 
            $nome = $_POST["nome"]; 
            $sigla = $_POST ["sigla"];


            // Prepara a consulta SQL para atualização de dados
            
            $query= "UPDATE especialidade SET descricao='$nome', sigla='$sigla' WHERE id=$id";
            
            // Executa a query de atualização $resu= mysqli_query($con, $query);
            $resu = mysqli_query($con, $query);

            // Verifica se a atualização na tabela foi bem-sucedida 
            if ($resu) { 
                echo "Atualização realizada com sucesso!";     
                } else {     
                echo "ERRO ao atualizar os dados: ".mysqli_error($con);     
                }
                
                // Fecha a conexão com o banco de dados     
                mysqli_close($con);     
                header("Location: ../consultas/especialidade.php");
                
                }elseif ($_SERVER ["REQUEST_METHOD"] == "POST" && isset($_POST['cancelar'])){     
                    header("Location: ../consultas/especialidade.php");     
                }     
                ?>     
                <?php

                // Verifica se o ID foi passado via GET     
                    if (isset($_GET['id'])) {
                        include('../clinica.php');
                
                $id = $_GET['id'];     
                // Consulta SQL para obter os dados da especialidade com o ID especificado     
                $query = "SELECT * FROM especialidade WHERE id = $id";     
                $result = mysqli_query($con, $query);     
                $row = mysqli_fetch_assoc($result);
                }
                ?>
                <form method="POST"> 
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">  
                    <label>Descrição da especialidade:</label>  
                    <input type="text" name="nome" size="100" maxlength="100" required value="<?php echo $row['descricao']; ?>">
                    <p><label>Sigla:</label>  
                    <input type="text" name="sigla" size="3" maxlength="3" required value="<?php echo $row['sigla']; ?>">  
                    <p><input type="submit" name="atualizar" value="Atualizar">  
                        <input type="submit" name="cancelar" value="Cancelar">  
            </form>  
        <?php
            
        ?>  
        </body>  
 </html>