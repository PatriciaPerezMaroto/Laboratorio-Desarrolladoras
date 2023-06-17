<!DOCTYPE html>
<html>
 <head>
        <title> Usuarios registrados</title>
        <link rel="stylesheet" href="datosstyle.css">
    </head> 
    <body>
<?php
        $servername = "localhost";
        $username = "root";
        $password ="";
        $dbname = "CursoSQL";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if ($conn->connect_error){
        die("Conexión errónea" . $conn->connect_error);
    }

    $sql = "SELECT * FROM FORMULARIO";
    $result = $conn->query($sql);
    
    if ($result->num_rows>0){
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Email</th>";

        while ($row = $result-> fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row["nombre"] . "</td>";
            echo "<td>" . $row["apellido1"] . "</td>";
            echo "<td>" . $row["apellido2"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
     
       }
       echo "</table>";

    }else {
        echo "No hay registros aun";
    }

    $conn->close();
    ?>
    </body>
    </html>
