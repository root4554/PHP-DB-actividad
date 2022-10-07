<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>

        <label for="DNI">DNI</label>
        <input type="text" name="DNI" id="DNI" placeholder="DNI" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" required>

        <label for="codMatricula" required>CodMatricula</label>
        <input type="text" name="codMatricula" id="codMatricula" placeholder="CodMatricula" required>

        <label for="ciclo">Ciclo</label>
        <input type="text" name="ciclo" id="ciclo" placeholder="Ciclo" required>

        <button type="submit">ADD Student</button>

    </form>
    <?php

    if (isset($_POST['nombre']) && isset($_POST['DNI']) && isset($_POST['email']) && isset($_POST['codMatricula']) && isset($_POST['ciclo'])) {

        $Nombre = $_POST['nombre'];
        $DNI = $_POST['DNI'];
        $Email = $_POST['email'];
        $CodMatricula = $_POST['codMatricula'];
        $Ciclo = $_POST['ciclo'];

        $mysqli = new mysqli("localhost", "root", "", "alumnos");

        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }

        if (!($sentencia = $mysqli->prepare("INSERT INTO Alumno (Nombre, DNI, Email, CodMatricula, Ciclo) VALUES (?, ?, ?, ?, ?)"))) {
            echo "Falló la preparación: (" . $mysqli->errno . ") " . $mysqli->error;
        }

        if (!$sentencia->bind_param("sssss", $Nombre, $DNI, $Email, $CodMatricula, $Ciclo)) {
            echo "Falló la vinculación de parámetros: (" . $sentencia->errno . ") " . $sentencia->error;
        }

        if (!$sentencia->execute()) {
            echo "Falló la ejecución: (" . $sentencia->errno . ") " . $sentencia->error;
        }

        $sentencia->close();

        header("Location: StudentsList.php");
    }

    ?>
</body>

</html>