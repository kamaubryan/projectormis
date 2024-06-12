<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-comptible" content="IE=edge" />
    <meta name="viewport" content="width-device-width, initial-scale=1.0" />
    <title>Projector 1</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"  />
    <link rel="stylesheet" href="P.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  </head>
    <body>
      <header>
        <?php include 'Inc/db_connection.php'?>;
      </header>
      <h3 class="sub-heading">Order now</h3>
     

      <form action="">
        <div class="inputBox">
          <div class="input">
            <span>Your name</span>
            <input type="text" placeholder="Enter your name">
          </div>
           
        <div class="inputBox">
          <div class="input">
            <span>Your contact</span>
            <input type="tel" id="phone" name="phone" placeholder="07********" pattern="[0-9]{2}-[0-9]{2}-[0-9]{3}-[0-9]{3}" required>
          </div>
           
        
          <div class="dropdown">
            <span>Department</span>
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              DEPARTMENT
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">OPCS</a></li>
              <li><a class="dropdown-item" href="#">PARLIAMENTARY AFFAIRS</a></li>
              <li><a class="dropdown-item" href="#">PERFORMANCE</a></li>
            </ul>
          </div>
           
        
          <div class="field input">
            <label for="Status"></label><br><br>
            Book:<input type="radio" name="Status" id="book" value="book">                              
            Take:<input type="radio" name="Status" id="take" value="take"> 
          </div><br><br>
           
        <div class="inputBox">

          <div class="input">
            <span>Date and time</span>
            <input type="datetime-local">
          </div>
           
        <div class="inputBox">
          <div class="input">
            <span>Meeting venue</span>
            <textarea name="" placeholder="enter your venue" id="" cols="30" rows="10"></textarea>
          </div>
           <form action="">
        <div class="inputBox">
          <div class="input">
            <span>Your message</span>
            <textarea name="" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
          </div>
        </div>

        <input type="submit" value="order now" class="btn">
      </form>
    </section>
    
    </body>
  
</html>