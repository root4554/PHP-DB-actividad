<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <a href="insert-student.php"> <button> ADD + </button> </a>

    <?php
    $mysqli = new mysqli("localhost", "root", "", "alumnos");
    if ($mysqli->connect_errno) {
        echo "<script> alert('Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ")</script>' " . $mysqli->connect_error;
    }

    // Show DB students
    $studentsList = $mysqli->query("SELECT * FROM Alumno");

    while ($student = $studentsList->fetch_array()) {
        // echo $student['nombre'] . " " . $student['dni'] . "<br>";
        echo "<div class='student'>";
        echo "<div class='student-pres'>";
        echo "<p>" . $student['nombre'] . "</p>";
        echo "</div>";
        echo '<h1 name="nombre">' . $student["Nombre"] . '</h1>';
        echo '<p name="ciclo">' . $student["Ciclo"] . '</p>';
        echo '<br>';
        echo "<a href 'show-student.php?DNI=$student[DNI]>'<button id='show' name='show'>Show Student</button></a>";
        echo "</div>";
        echo "<br>";
    }

    ?>
</body>

</html>