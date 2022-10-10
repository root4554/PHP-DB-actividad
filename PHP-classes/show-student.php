<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $mysqli = new mysqli("localhost", "root", "", "alumnos");
    if ($mysqli->connect_errno) {
        echo "<script> alert('Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ")</script>' " . $mysqli->connect_error;
    }
    $DNI = $_GET['DNI'];

    // Show DB student
    $student = $mysqli->query("SELECT Nombre, DNI, Email, CodMatricula, Ciclo FROM Alumno WHERE DNI  = '$DNI' ")->fetch_assoc();

    echo "<form method='POST'>";
    echo "<label for='nombre'>Nombre</label>";
    echo "<input type='text' required name='nombre' value='" . $student["Nombre"] . "'>";
    echo "<br>";
    echo "<label for='dni'>DNI</label>";
    echo "<input type='text' disabled name='dni' value='" . $student["DNI"] . "'>";
    echo "<br>";
    echo "<label for='email'>Email</label>";
    echo "<input type='text' required name='email' value='" . $student["Email"] . "'>";
    echo "<br>";
    echo "<label for='codMatricula'>CodMatricula</label>";
    echo "<input type='text' required name='codMatricula' value='" . $student["CodMatricula"] . "'>";
    echo "<br>";
    echo "<label for='ciclo'>Ciclo</label>";
    echo "<input type='text' required name='ciclo' value='" . $student["Ciclo"] . "'>";
    echo "<br>";
    echo "<button type='submit' id='update' value='update' name='accion'>Update Student</button>";
    echo "<button type='submit' id='delete' value='delete' name='accion'>Delete Student</button>";
    echo "</form>";

    // Update student
    function updateStudent($mysqli, $DNI)
    {
        if (isset($_POST['nombre']) && isset($_POST['DNI']) && isset($_POST['email']) && isset($_POST['codMatricula']) && isset($_POST['ciclo'])) {
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            $email = $_POST['email'];
            $codMatricula = $_POST['codMatricula'];
            $ciclo = $_POST['ciclo'];

            $mysqli->query("UPDATE Alumno SET Nombre = '$nombre', DNI = '$dni', Email = '$email', CodMatricula = '$codMatricula', Ciclo = '$ciclo' WHERE DNI = '$DNI' ");
            echo "<script>alert('el alumno ha editado correctamente')</script>";
            header("Location: StudentsList.php");
        }
    }


    // Remove Student
    function removeStudent($mysqli, $DNI)
    {
        if (isset($_POST['nombre']) && isset($_POST['DNI']) && isset($_POST['email']) && isset($_POST['codMatricula']) && isset($_POST['ciclo'])) {
            $mysqli->query("DELETE FROM Alumno WHERE DNI = '$DNI' ");
            echo "<script>alert('el alumno ha sido eliminado correctamente')</script>";
            header("Location: StudentsList.php");
        }
    }
    $accion = $_POST['accion'] ?? null;
    switch ($accion) {
        case 'update':
            updateStudent($mysqli, $DNI);
            break;
        case 'delete':
            removeStudent($mysqli, $DNI);
            break;
    }

    ?>
</body>

</html>