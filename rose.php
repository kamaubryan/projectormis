
<?php
include 'Inc/db_connection.php';
if(isset($_POST['submit'])){
  $username =$_POST['username'];
  $contact =$_POST['contact'];
  $gender =$_POST['gender'];
  $department =$_POST['department'];
  
  $password=$_POST['password'];
  $sql = "INSERT INTO users (username,contact,gender,department,password) 
  VALUES('$username','$contact','gender','department','$password')";
  $result = mysqli_query($conn,$sql);
  if($result){
    echo"Data entered successfully";
    header('location: login.php');
  }else{
    die(mysqli_error($conn));
  }
}
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <meta name="google-signin-client_id" content="254180137510-mirk69nafpran16rq66l3n7ihccsfnvh.apps.googleusercontent.com">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-8rc+yY9mWGUgkeWuf6Vjn/Td4UPzQqpQ5OU8KLz8sZy53N7LJ1FPT5qFnlYw3cG/XYVJWcO1h7HkkHPh1W/nGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Font Awesome -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script> <!-- Add this line for reCAPTCHA -->
  
  <!-- Link Swiper's CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <script src="https://www.google.com/recaptcha/enterprise.js?render=6LdVFZYpAAAAANPSensxyMxjoOJOYcFh8lcMbqwb"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel=" stylesheet" href="projector.css">
<!-- Font Awesome CSS -->

    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 30px 0;
        }
        .card {
            border-radius: 8px;
            padding: 0.5% 5%;
            box-shadow: 2px 2px 2px 2px gray;
        }
        label{
            font-size: 150%;
            font-weight: 800;
        }
        input{
            width: 80%;
            height:40px;
            border: 1px solid #999;
            font-size: 150%;
            border-radius: 8px;
            display: block;
            padding: 5 10px;
        }
        

        .card-title{
             font-size: 60px;
             font-weight: 800;
             color: #000;
             margin-bottom: 20px;
        }
        .btn{
             margin-top: 1rem;
             display: inline-block;
            font-size: 1.7rem;
            color: rgb(192, 163, 219);
            background: var(--black);
             border-radius: 20rem;
            cursor: pointer;
            padding: .8rem .3rem;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign Up</h5>
                        <form action="" method="post">
                            <div class="py-3">
                                <label for="">Username:</label>
                                <input type="text" name="username" id="" placeholder="Enter Username">
                            </div>
                            <div class="field input"  style="display: block; justify-content: center; align-items: center;">
                                <label for="contact">Contact:</label>
                                <input type="tel" id="phone" name="phone" placeholder="07********" pattern="[0-9]{2}-[0-9]{2}-[0-9]{3}-[0-9]{3}" required>
                              </div>
                              <div class="field input">
                                <label for="gender">Gender:</label><br><br>
                                Male:<input type="radio" name="gender" id="male" value="male">                              
                                Female:<input type="radio" name="gender" id="female" value="female"> 
                              </div><br><br>
                              <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  DEPARTMENT
                                </button>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">OPCS</a></li>
                                  <li><a class="dropdown-item" href="#">PARLIAMENTARY AFFAIRS</a></li>
                                  <li><a class="dropdown-item" href="#">PERFORMANCE</a></li>
                                </ul>
                              </div>
                              <div class="py-3">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" placeholder="Enter Password">
                            </div>
                           
                            <div class="field input">
                              <input type="submit" class="btn" name="submit" value="Sign up">
                            </div>
                    
                            <div class="links">
                              Already have an account? <a href="login.html">LOG IN</a>
                            </div>
                     
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script>
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
            console.log('Name: ' + profile.getName());
            console.log('Image URL: ' + profile.getImageUrl());
            console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
        }
    </script>
</body>
</html>
