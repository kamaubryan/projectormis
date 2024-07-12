<?php
// Include database connection file
include '../conn.php';

// Check if ID is provided via POST
if(isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare SQL statement to fetch projector details
    $sql = "SELECT id, name, image_path FROM projector WHERE id = ?";
    
    // Prepare statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("i", $id);

        // Execute statement
        if ($stmt->execute()) {
            // Bind result variables
            $stmt->bind_result($projector_id, $projector_name, $image_path);

            // Fetch data
            if ($stmt->fetch()) {
                // Create an array to store projector details
                $projectorDetails = array(
                    'id' => $projector_id,
                    'name' => $projector_name,
                    'image_path' => $image_path
                    // Add more fields as needed
                );

                // Close statement
                $stmt->close();

                // Close database connection
                $conn->close();

                // Return projector details as JSON
                echo json_encode($projectorDetails);
                exit;
            } else {
                // No projector found with the given ID
                echo json_encode(array('error' => 'Projector not found'));
                exit;
            }
        } else {
            // Error executing statement
            echo json_encode(array('error' => 'Error executing statement'));
            exit;
        }
    } else {
        // Error preparing statement
        echo json_encode(array('error' => 'Statement preparation error'));
        exit;
    }
} else {
    // ID not provided
    echo json_encode(array('error' => 'ID not provided'));
    exit;
}
?>
