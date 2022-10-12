<?php

session_start();
if(!isset($_SESSION['user'])){
    header("Location: loginform.php");
}
?>

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
    ?>

    <form method="POST">
        <label for='nombre'>Nombre</label>
        <input name="nombre" value="<?php echo $student['Nombre'] ?>" required>
        <label for='dni'>DNI</label>
        <input name="DNI" value="<?php echo $student['DNI'] ?>" disabled required>
        <label for='email'>Email</label>
        <input name="email" value="<?php echo $student['Email'] ?>" required>
        <label for='codMatricula'>CodMatricula</label>
        <input name="codMatricula" value="<?php echo $student['CodMatricula'] ?>" required>
        <label for='ciclo'>Ciclo</label>
        <input name="ciclo" value="<?php echo $student['Ciclo'] ?>" required>
        <button type="submit" id="update" value='Update' name='accion'>Update</button>
        <button type="submit" id="delete" value='Delete' name='accion'>Delete</button>
    </form>

    <?php
    // Update students
    function updateStudent($mysqli, $DNI)
    {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $codMatricula = $_POST['codMatricula'];
        $ciclo = $_POST['ciclo'];

        $mysqli->query("UPDATE Alumno SET Nombre = '$nombre', DNI = '$DNI', Email = '$email', CodMatricula ='$codMatricula', Ciclo = '$ciclo' WHERE DNI = '$DNI' ");
        echo '<script> alert("el alumno ha editado correctamente")</script>';
        header("Location: StudentsList.php");
    }

    // Remove Student
    function removeStudent($mysqli, $DNI)
    {
        $mysqli->query("DELETE FROM Alumno WHERE DNI = '$DNI' ");
        echo '<script>
        alert("Has eliminado el alumno correctamente")");
        window.location.href="StudentsList.php";
        </script>';
        // header("Location: ");
    }
    $accion = $_POST['accion'] ?? null;
    switch ($accion) {
        case 'Update':
            updateStudent($mysqli, $DNI);
            break;
        case 'Delete':
            removeStudent($mysqli, $DNI);
            break;
    }

    ?>
</body>

</html>