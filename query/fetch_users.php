<?php
// Include the database connection file
include '../conn.php';

// Check if food ID is provided via GET request

    // Query to fetch food details based on food ID
    $query = "SELECT * FROM projector_details";
    $result = $conn->query($query);

    // Check if the query was successful and if there is exactly one row returned
    if ($result && $result->num_rows > 0) {
        // Generate HTML markup for modal body with food details
        echo '
        <table>
        ';
while($row = $result->fetch_assoc())
{
    echo '
    <tr>
    <td>'.$row['id'].'</td>
    <td>'.$row['projector_id'].'</td>
    <td>'.$row['name'].'</td>
    <td>'.$row['contact'].'</td>
    <td>'.$row['department'].'</td>
    <td>'.$row['status'].'</td>
    <td>'.$row['date_time'].'</td>
    <td>'.$row['venue'].'</td>
    <td>'.$row['message'].'</td>
    <td>'.$row[''].'</td>
    </tr>
    ';
}
        echo'
        </table>
        ';
    } else {
        echo 'Food not found'; // If food with provided ID is not found
    }
echo 'Invalid request'; // If food ID is not provided in the request
?>
