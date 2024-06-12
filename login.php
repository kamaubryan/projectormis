<?php
// Start the session
session_start();

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="google-signin-client_id" content="254180137510-mirk69nafpran16rq66l3n7ihccsfnvh.apps.googleusercontent.com">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-8rc+yY9mWGUgkeWuf6Vjn/Td4UPzQqpQ5OU8KLz8sZy53N7LJ1FPT5qFnlYw3cG/XYVJWcO1h7HkkHPh1W/nGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Font Awesome -->

  
  <!-- Link Swiper's CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <script src="https://www.google.com/recaptcha/enterprise.js?render=6LdVFZYpAAAAANPSensxyMxjoOJOYcFh8lcMbqwb"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
            padding: 10% 10%;
            box-shadow: 2px 2px 2px 2px gray;
        }
        label{
            font-size: 150%;
            font-weight: 800;
        }
        input{
            width: 100%;
            height: 60px;
            border: 1px solid #999;
            font-size: 150%;
            border-radius: 8px;
            display: block;
            padding: 0 30px;
        }

        .card-title{
             font-size: 60px;
             font-weight: 800;
             color: #000;
             margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <form action="" method="post">
                            <div class="py-3">
                                <label for="">Username</label>
                                <input type="text" name="username" id="" placeholder="Enter Username">
                            </div>
                            <div class="py-3">
                                <label for="">Password</label>
                                <input type="password" name="password" id="" placeholder="Enter Password">
                            </div>
                            <div class="form_group">
                              <div class="g-recaptcha" data-sitekey="6LdVFZYpAAAAANPSensxyMxjoOJOYcFh8lcMbqwb"></div> <!-- Add reCAPTCHA widget here -->
                          </div>
                            <p class="text-right"><a href="">Forgot Password ?</a></p>
                            <button type="submit" name='submit' class="btn btn-primary btn-block my-3" style="padding: 20px 0; border-radius: 8px;">Login</button>
                            <p>Don't have an account <a href="rose.html">SIGNUP</a></p>
                            <div class="g-signin2" data-onsuccess="onSignIn" style="width: 400px; height: 60px; text-align: left"></div>
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
