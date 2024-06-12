<?php
session_start();
$id = $_GET['id'];
echo $id;

if ($id === "1") {
    header("Location: P1.php");
    exit(); // Exit after redirection
} else if ($id === "2") {
    $_SESSION['id'] = '2'; 
    header("Location: P2.php");
    exit(); // Exit after redirection

} else {
    echo '<script>alert("Restaurant Not found")</script>';
    header("Location: wp.php");
    exit(); // Exit after redirection
}
?>