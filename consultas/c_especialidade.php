<html> 
    <head> 
    <meta charset="UTF-8"><title> Especialidades médicas </title> 
    </head> 
    <body> 
        <form method="POST" > 
        <p><center><h1> Especialidades médicas </center></h1> 
        <table border="1" width="100%" > 
        <?php 
            include ('../clinica.php'); 
            $query="Select * from especialidade order by descricao"; 
            $resu=mysqli_query($con, $query) or die (mysqli_connect_error()); 
            echo "<tr><td><b> Descrição         </td><td><b> Sigla </td></tr>";
            while ($reg = mysqli_fetch_array($resu)) { 
                echo "<tr><td>".$reg['descricao']. "</td>"; 
                echo "<td>".$reg['sigla']. "</td>"; 
                echo "<td><a href='../alterar/a_especialide.php?id=". $reg['id']."'>Editar</a></td>"; 
                echo "<td> <a href='excluir ../excluir/e_especialidade.php?id=". $reg['id']. "'>Excluir </a></td></tr>"; 
            }        
        ?>        
        </table>        
        </form>        
        <?php
            mysqli_close($con);        
        ?>        
    </body> 
</html>