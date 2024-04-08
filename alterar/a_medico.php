<?php 
session_start(); 
include ("../clinica.php"); 
$id_medico = $_POST['id_medico']; 
$nome = $_POST['nome']; 
$cpf = $_POST['cpf']; 
$endereco = $_POST['endereco']; 
$numero= $_POST['numero']; 
$cidade= $_POST['cidade']; 
$estado= $_POST['estado']; 
$cod_esp = $_POST['cod_esp'];
 
$result= "UPDATE medico SET nome='$nome', cpf='$cpf', endereco='$endereco', numero='$numero',"; $result.=" cidade='$cidade', estado='$estado', cod_esp='$cod_esp' WHERE id medico='$id_medico'";
 
$resultado= mysqli_query($con, $result) or die (mysqli_connect_error());
 
if (mysqli_affected_rows($con)) {
    $_SESSION['msg'] = "<p style='color:green; '>Médico alterado com sucesso</p>";
    header("Location: alter medico.php"); 
}else {
    $_SESSION['msg'] = "<p style='color:green; '>Médico não foi alterado, verifique</p>";
    header("Location: ../consultas/c_medico.php"); 
} 
mysqli_close($con);
 
?>