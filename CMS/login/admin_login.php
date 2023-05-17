<!-- PHP Starts Here -->
<?php 

require_once "../connection/connect.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   

    if (isset($_POST['email']) && isset($_POST['password'])) {

 // Get the form data
 $username = $_POST['email'];
 $password = $_POST['password'];

    }

 
// Prepare the SQL query to select the user by username and password
 $sql = "SELECT * FROM  `admin` where 	user='$username' and password='$password'";

 // Execute the query and check the result
 $result = mysqli_query($link, $sql);
 if (mysqli_num_rows($result) == 1) {
     // The login is successful, store the username in the session
     $_SESSION['username'] = $username;

     // Redirect to the dashboard page
     header('Location: ../dashboards/admin_dashboard.php');
     exit;
 } else {
     // Invalid login
      // Invalid login, display an alert
      echo '<script>alert("Invalid registration no or password.");</script>';
  
 }

 //close connection
 mysqli_close($link);
}


    

   
?>








<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




    <body style="background-image: url('../image/college.jpg');  background-repeat: no-repeat;
  background-size: fill;">

    <br><br><br><br><br><br><br><br>
   
<div class="container mt-12" >


<div class="row justify-content-center align-items-center text-center p-2" >
    <div class="m-1 col-sm-8 col-md-6 col-lg-4 shadow-sm p-3 mb-5 bg-white border rounded">
        <div class="pt-5 pb-5"  >
            <img class="rounded mx-auto d-block" src="../image/admin.png" alt="" width=70px height=70px>
            <h4 class="text-center text-uppercase mt-3">Admin Login</h4>
            <form class="form text-center" method="POST" action="">
                <div class="form-group input-group-md" >
                    <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Admin username">
                
                </div>
                <div class="form-group input-group-md">
                    <input type="password" class="form-control" name="password" placeholder="Admin Password">
                
                </div>
                

           <input type="submit" class="btn btn-lg btn-block btn-primary mt-4"  value="Login">
                    </form>
        </div>
        </div>
</div>
</div>

</div>

</body>









  

