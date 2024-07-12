<?php 
    session_start();
    if (!$_SESSION['username']){
        header("Location: login.php?next=index");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>projectors</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="projector.css">
</head>
<body>

<section class="intro">
    <div class="container">
        <h1>PROJECTOR MANAGEMENT SYSTEM</h1>
        <p>Please choose projector from the options below:</p>
    </div>
    <?php if (isset($_SESSION['username'])): ?>
        <!-- Display logout button if user is logged in -->
        <a href="logout.php">Logout</a>
       
    <?php endif; ?>
</section>

<section class="review" id="review">
    <div class="container">
        <div class="row">

            <?php
            // Include your database connection file
            include 'conn.php';

            // Fetch projectors from the database
            $sql = "SELECT * FROM projector";
            $result = mysqli_query($conn, $sql);


            // Check if there are any projectors
            if (mysqli_num_rows($result) > 0) {
                // Loop through each row and display projector info
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="col-4">';
                    echo '<div class="testimonial">';
                    echo '<img src="Images/'. $row['image_path'] . '" alt="" width="100%" height="400px"/>'; // Placeholder image
                    echo '<div class="name">' . $row['name'] . '</div>';
                    echo '<a href="projectors.php?id=' .  $row['id'] . '" class="btn px-4" stye="background-color: blue; color: white">ENTER</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>No projector found.</p>';
            }
            ?>

        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
