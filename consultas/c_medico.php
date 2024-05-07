<?php 
    if (session_status() !== PHP_SESSION_ACTIVE) { 
        session_start(); 
} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="UTF-8"> 
    <title> Médicos </title> 
</head> 
<body> 
    <?php 
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']); 
        } 
    ?> 
    <form method="POST" action=""> 
    <p><center><h1> Médicos </center></h1> 
    <table border="1" width="100%"> 
    <?php 
    include('../clinica.php');    
    $sql="Select * from medico order by nome"; 
    $resu=mysqli_query($con, $sql) or die (mysqli_connect_error());
    
    while ($reg=mysqli_fetch_array($resu)) {
        echo "<tr><td>".$reg['id_medico']."</td>"; 
        echo "<td>". $reg['nome']."</td>"; 
        echo "<td><a href='../alterar/a_medico_template.php?id_medico=". $reg['id_medico']. "'>Editar</a></td>"; 
        echo "<td><a href='del_medico.php?id medico=". $reg['id_medico']."'>Excluir </a></td></tr>";
    }
    ?> 
    </table></form> 
    <?php 
    mysqli_close($con); 
    ?>     
    <a href="../index.html"><button>VOLTAR</button></a>
</body> 
</html>