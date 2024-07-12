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
      <h3 class="sub-heading"></h3>
     
        <?php
         include 'conn.php';

         $selproj = "SELECT * FROM projector";
         $query = mysqli_query($conn, $selproj);

         if(isset($_POST['submit']))
         {

         $projector_id = $_POST['projector_id'];
         $name = $_POST['borrower_name'];
         $phone = $_POST['phone'];
         $department = $_POST['department'];
         $status = $_POST['status'];
         $date = $_POST['date'];
         $venue = $_POST['venue'];
         $message = $_POST['message'];

         $insert = "INSERT INTO projector_details (projector_id, name, contact,department, status, date_time, venue, message) VALUES ('$projector_id','$name','$phone','$department','$status','$date','$venue','$message')";
         $insert_qry = mysqli_query($conn, $insert);

         if($insert_qry)
         {
          echo "Data Inserted";
         }
         else{
          echo "Error inserting Data:".mysqli_error($conn);
         }

         }
         

         ?>;
      
     

      <form action="" method="post">
        <div class="inputBox">
          <div class="input">
            <strong> <span>Your name</span></strong>
            <input type="text" name="borrower_name" placeholder="Enter your name">
          </div><br>
           
        <div class="inputBox">
          <div class="input">
            <span><b>Your contact</b></span>
            <input type="tel" id="phone" name="phone" placeholder="07********" pattern="[0-9]{2}-[0-9]{2}-[0-9]{3}-[0-9]{3}" required>
          </div>
           
          <div class="inputBox">
            <div class="input">
            <label  for ="projector" class="dep"><b>Projector:</b></label>
          <select id="projector" name = "projector_id">
          <?php
          while($row=mysqli_fetch_assoc($query))
          {
          echo "<option value='".$row['id']."'> ".$row['name']."</option>";
          }
          ?>
          </select>
        </div>
          </div>
        
          <div class="dropdown">
            <label  for ="DEPARTMENT" class="dep"><b>Department:</b></label>
            
            <select id="dep" name="department" id="DEPARTMENT">
              <option value="ICT"><b>ICT</b></option>
              <option value="Human Resource">Human Resource</option>
              <option value="Finance">Finance</option>
              <option value="Accounts">Accounts</option>
              <option value="CPPMDA">CPPMDA</option>
              <option value="Public communications">Public communications</option>
              <option value="Supply chain management">Supply chain management</option>

              </select>
          </div>
           
        
          <div class="field input">
            <label for="Status"></label><br><br>
            <b>Book:</b><input type="radio" name="status" id="book" value="booked">                              
            <b>Take:</b><input type="radio" name="status" id="take" value="taken"> 
          </div><br><br>
           
        <div class="inputBox">

          <div class="input">
            <span><b>Date and time</b></span>
            <input type="datetime-local" name="date">
          </div><br>
           
        <div class="inputBox">
          <div class="input">
            <span><b>Meeting venue</b></span>
            <textarea name="venue" placeholder="enter your venue" id="" cols="20" rows="4"></textarea>
          </div>
           <form action=""><br>
        <div class="inputBox">
          <div class="input">
            <b><span>Your message</span></b>
            <textarea name="message" max-length = "200" placeholder="enter your message" id="" cols="20" rows="4"></textarea>
          </div>
        </div>

        <button><input  type="submit" name="submit" value="ORDER NOW!" class="btn"></button>
        
        <a class="dropdown-item" href="login.php">Logout</a>
      </form>
    </section>
    
    </body>
    
</html>