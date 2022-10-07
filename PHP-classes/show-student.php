<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
s

<body>

    <?php
    $mysqli = new mysqli("localhost", "root", "", "alumnos");
    if ($mysqli->connect_errno) {
        echo "<script> alert('Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ")</script>' " . $mysqli->connect_error;
    }
    $DNI = $_GET['dni'];

    // Show DB student
    $student = $mysqli->query("SELECT Nombre, DNI, Email, CodMatricula, Ciclo FROM Alumno WHERE DNI = " . $_GET['dni']);

    echo "<div class='student'>";
    echo '<h1 name="nombre">' . $student["Nombre"] . '</h1>';
    echo 'h2 name="dni">' . $student["DNI"] . '</h2>';
    echo '<p name="email">' . $student["Email"] . '</p>';
    echo '<p name="codMatricula">' . $student["CodMatricula"] . '</p>';
    echo '<p name="ciclo">' . $student["Ciclo"] . '</p>';
    echo '</div>';







    // while ($student = $studentsList->fetch_array()) {
    //     // echo $student['nombre'] . " " . $student['dni'] . "<br>";
    //     echo "<div class='student'>";
    //     echo "<div class='student-pres'>";
    //     echo "<p>" . $student['nombre'] . "</p>";
    //     echo "</div>";
    //     echo '<h1 name="nombre">' . $student["Nombre"] . '</h1>';
    //     echo '<p name="ciclo">' . $student["Ciclo"] . '</p>';
    //     echo '<br>';
    //     echo "<button id='show' name='show'>Show Student</button>";
    //     echo "</div>";
    //     echo "<br>";
    // }
    ?>
</body>

</html>