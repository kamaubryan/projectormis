<?php
    // Include the database connection file
    include '../conn.php';

    // Check if all required fields are provided via POST request
    if (isset($_POST['id'], $_POST['name'], $_POST['image'])) {
        $id = $_POST['id'];
        $projector_name = $_POST['name'];
        $editImage = $_POST['image'];
    
        // Query to update projector details
        $query = "UPDATE projector SET name='$projector_name', image_path='$editImage' WHERE id=$id";

        // Execute the query
        if (mysqli_query($conn, $query)) {
            echo json_encode(array('status' => 'success', 'message' => 'Projector details updated successfully'));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Error updating projector details: ' . mysqli_error($conn)));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Incomplete data provided'));
    }
?>
