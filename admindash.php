
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Navbar -->
<nav class="navbar sticky-top  navbar-expand-lg navbar-dark bg-primary">
    <div class="d-flex mx-5 justify-content-between w-100 py-3">
        <a class="navbar-brand" href="#">Admin Dashboard</a>

        
        <!-- Profile dropdown -->
        <div class="navbar-nav ms-auto">
            <!-- Navbar links -->
            <div class="navbar-nav">
                <a class="nav-link" href="#"><i class="fas fa-globe"></i> View Site</a>
                <a class="nav-link" href="#"><i class="fas fa-user"></i> User</a>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i> View Profile
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="login.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div class="container-fluid">
    <div class="row">
        <!-- Main content area -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

            <!-- Add food button and search box -->
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <button class="btn btn-primary">Print</button>
                </div>

                <div>
                    <input type="text" class="form-control" placeholder="Search" style="width:600px">

                </div>
                <button class="btn btn-success " style="height: 50px;" data-bs-toggle="modal" data-bs-target="#addProjectorModal"> <i class="fa fa-plus"></i> Add Projector</button>
            </div>

            <!-- Food table -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <!-- PHP code to fetch and display food data -->
                        <?php
                          include 'conn.php';
                          session_start();


                            // Query to fetch food data
                            $sql = "SELECT id, name , image_path FROM projector";

                            // Execute query
                            $result = $conn->query($sql);

                            // Check if result has rows
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while($row = $result->fetch_assoc()) {
                                    $_SESSION['row_id'] = $row['id'];
                                    $target = "#updateProjectorModal".$row['id'];
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td> <img src='images/" . $row["image_path"] . "' width='50px'/></td>";
                                    echo '<td>
                                        <button type="button" class="btn btn-secondary btn-sm" onclick="editDetails(' . $row['id'] . ')" data-bs-toggle="modal" data-bs-target="#updateProjectorModal">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteProjectorModal">Delete</button>
                                    </td>';
                                    // Add more cells for additional data
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4'>No projectors found</td></tr>";
                            }

                        // Close connection
                        $conn->close();
                        ?>
                        
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="updateProjectorModal" tabindex="-1" aria-labelledby="updateProjectorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateProjectorModalLabel">Update Projector</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateProjectorForm">
                    <input type="hidden" id="updateProjectorId" name="id">
                    <div class="mb-3">
                        <label for="updateProjectorName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="updateProjectorName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="updateProjectorImage" class="form-label">Image</label>
                        <input type="text" class="form-control" id="updateProjectorImage" name="image">
                    </div>
                    <!-- Add more fields as needed -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="updateProjector()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addProjectorModal" tabindex="-1" aria-labelledby="addProjectorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProjectorModalLabel">Update Projector</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addProjectorForm" enctype = "multipart/form-data">
                    <div class="mb-3">
                        <label for="addProjectorName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="addProjectorName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="addProjectorImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="addProjectorImage" name="image">
                    </div>
                    <!-- Add more fields as needed -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addProjector()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div id="responseMessage"></div>

        </main>
    </div>
</div>

<!-- Bootstrap JS (Optional) -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Include jQuery library from CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Add an onclick event to each "View" button to trigger the JavaScript function -->
<button type="button" class="btn btn-primary btn-sm" onclick="viewProjector(<?php echo $row['id']; ?>)" data-bs-toggle="modal" data-bs-target="#viewProjectModal">View</button>

<script>
    // JavaScript function to populate the view modal with projector details
    function viewProjector(id) {
        // AJAX request to fetch projector details from the server
        $.ajax({
            type: 'POST',
            url: 'modals/get_projector.php',
            data: { id: id },
            success: function(response) {
                // Parse the JSON response
                console.log(response);
                var projectorDetails = JSON.parse(response);

                // Example: Populate modal with projector details
                $('#viewProjectorId').text(projectorDetails.id);
                $('#viewProjectorName').text(projectorDetails.name);
                // Assuming #viewImage is an img tag
                $('#viewImage').attr('src', projectorDetails.image_path);

                // Show the modal
                $('#viewProjectorModal').modal('show');
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    }

    // JavaScript function to populate the update modal with projector details
    function editDetails(id) {
        // AJAX request to fetch projector details from the server
        $.ajax({
            type: 'POST',
            url: 'modals/get_projector.php',
            data: { id: id },
            success: function(response) {
                // Parse the JSON response
                console.log(response);
                var projectorDetails = JSON.parse(response);

                // Example: Populate update modal with projector details
                $('#updateProjectorId').val(projectorDetails.id); // Assuming an input field for ID
                $('#updateProjectorName').val(projectorDetails.name); // Assuming an input field for name
                $('#updateProjectorImage').val(projectorDetails.image_path); // Assuming an input field for image path

                // Show the update modal
                $('#updateProjectorModal').modal('show');
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    }

    // Function to handle form submission and image upload
    function addProjector() {
    var form = document.getElementById('addProjectorForm');
    var formData = new FormData(form);

    // AJAX request to handle form submission
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'query/add_projector.php', true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var response = xhr.responseText;
                console.log(response); // Log the response for debugging

                try {
                    var jsonResponse = JSON.parse(response);
                    if (jsonResponse.status === 'success') {
                        alert('Projector added successfully');
                        window.location.href = '../admindash.php'; // Redirect to admin dashboard
                    } else {
                        alert('Error: ' + jsonResponse.message);
                    }
                } catch (e) {
                    console.error('Error parsing JSON response: ' + e);
                }
            } else {
                console.error('Error: AJAX request failed with status ' + xhr.status);
                alert('Error: Unable to add projector due to network issue. Please try again.');
            }
        }
    };

    xhr.onerror = function() {
        console.error('Error: AJAX request failed');
        alert('Error: Unable to add projector due to network issue. Please try again.');
    };

    xhr.send(formData);
}

// Optional: Add event listener to handle form submission
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('addProjectorForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        addProjector(); // Call function to handle form submission
    });
});



    function updateProjector() {
        var formData = $('#updateProjectorForm').serialize();
        
        $.ajax({
            type: 'POST',
            url: 'modals/update_projector.php',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#responseMessage').html('<div class="success">' + response.message + '</div>');
                    // Optionally, you can reset the form after successful update
                    $('#editProjectorForm')[0].reset();
                } else {
                    $('#responseMessage').html('<div class="error">' + response.message + '</div>');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ' + status + ' - ' + error);
                $('#responseMessage').html('<div class="error">AJAX Error: ' + status + '</div>');
            }
        });
    }
</script>

