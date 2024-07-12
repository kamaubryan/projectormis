

<?php
session_start();
$id = $_GET['id'];
echo $id;



if ($id === "1") {
    header("Location: P1.php");
    exit(); // Exit after redirection
} else {
    echo '<script>alert("projector Not found")</script>';
    header("Location: login.php");
    exit(); // Exit after redirection
}
?>