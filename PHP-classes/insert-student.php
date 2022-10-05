<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP-SELF"]); ?>">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
        <label for="DNI">DNI</label>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" required>
        <input type="text" name="DNI" id="DNI" placeholder="DNI" required>
        <label for="CodMatricula" required>CodMatricula</label>
        <input type="text" name="CodMatricula" id="CodMatricula" placeholder="CodMatricula" required>
        <label for="ciclo">Ciclo</label>
        <input type="text" name="ciclo" id="ciclo" placeholder="Ciclo" required>
        <button type="submit">ADD Student</button>

    </form>
    <?php

    if (isset($_POST['nombre']) && isset($_POST['DNI']) && isset($_POSY['email']) && isset($_POST['CodMatricula']) && isset($_POST['ciclo'])) {

        $nombre = $_POST['nombre'];
        $DNI = $_POST['DNI'];
        $Email = $_POST['email'];
        $CodMatricula = $_POST['CodMatricula'];
        $ciclo = $_POST['ciclo'];

        $mysqli = new mysqli("localhost", "root", "", "alumnos");
        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        

        $mysqli->query("INSERT INTO Alumno (Nombre, DNI, Email, CodMatricula, Ciclo) VALUES ('$nombre', '$DNI', '$Email', '$CodMatricula', '$ciclo')");
    } else {
        echo "<script> alert('Fallo al insertar alumno');</script>";
    }
    ?>
</body>

</html>