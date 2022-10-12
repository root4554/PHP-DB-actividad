<?php
$user = $_GET['user'];
$pass = $_GET['pass'];

if($user=="anass" && $pass=="kbir"){
    echo "user y pass correctos";
    session_start();
    $_SESSION['user']=$user;
   header("Location: StudentsList.php");
}else{
    header("Location: loginform.php");
}