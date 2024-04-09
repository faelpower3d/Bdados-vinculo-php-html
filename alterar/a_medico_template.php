<?php 
session_start();
include_once("../clinica.php");
$id_medico =filter_input (INPUT_GET, 'id_medico', FILTER_SANITIZE_NUMBER_INT); 
$result = "SELECT * FROM medico WHERE id_medico = '$id_medico'";  
$resultado = mysqli_query($con, $result); 
$row = mysqli_fetch_assoc($resultado); 
$cod_esp=$row['cod_esp']; 
?> 
<!DOCTYPE html> 
<html lang="pt-br"> 
<head> 
<meta charset="utf-8"> 
<title>CRUD Editar Médico</title> 
</head> 
<body> 
<h1>Alteração Médico</h1> 
<?php 
    if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg']; 
            unset ($_SESSION['msg']);
    }
?> 
 
<form method="POST" action="a_medico.php"> 
<input type="hidden" name="id medico" value="<?php echo $row['id_medico']; ?>">
    <p><label>Nome: </label><input type="text" name="nome" size="100" 
    value="<?php echo $row['nome']; ?>">
 
    <label> CPF: </label><input type="text" name="cpf" size="30" 
    value="<?php echo $row['cpf']; ?>">
 
<fieldset><legend> Endereço </legend> 
<table width="80%"> 
<tr> 
<td> Endereço: </td><td><input type="text" name="endereco" size="100" value="<?php echo $row['endereco'];?>"></td>
<td> Número: </td><td><input type="number" name="numero" value="<?php echo $row['numero'];?>"></td>
</tr> 
<tr> 
<td> Cidade: </td><td><input type="text" name="cidade" 
value="<?php echo $row['cidade'];?>"></td> 
<td> Estado: </td><td><select name="estado" > 
<option value="<?php echo $row['estado'];?>"> 
<?php echo $row['estado'];?></option> 
<option value="SP"> SP </option>
<option value="BA"> BA </option> 
<option value="RJ"> RJ </option> 
<option value="MG"> MG </option> 
<option value="PR"> PR </option> 
</select> 
</td> 
</tr> 
</table> 
</fieldset> 
<p><label> Especialidade: </label> 
<select name="cod esp"> ="cod_esp"> 
<?php 
//include("conexao.php"); 
$query= "SELECT * from especialidade WHERE id= $cod_esp;";
 
$resu= mysqli_query($con, $query) or die (mysqli_connect_error()); 
$reg= mysqli_fetch_assoc($resu); 
?>  
    <option value="<?php echo $row['cod_esp'];?>">
    <?php echo $reg['descricao'];?></option>
<?php 
$query2= "SELECT * from especialidade ORDER BY descricao;"; 
$resu2 =mysqli_query($con, $query2) or die(mysqli_connect_error()); 
while ($reg2= mysqli_fetch_array($resu2)) {
?> 
<option value = "<?php echo $reg2['id'];?>"> <?php echo $reg2['descricao'];?> </option> 
<?php
}
mysqli_close($con); 
?> 
</select> 
<p><input type="submit" value="Salvar">
</body> 
</html>