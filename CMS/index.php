<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 500px;
            padding: 20px;
            margin: 50px auto;
            background-color: #fff;
           border-radius: 30px;
        }
       
        th, td {
  padding: 28px;
}

body {
  background-image: url('image/college.jpg');
  background-repeat: no-repeat;
  background-size: fill;

}


img:hover {
    -ms-transform: scale(1.1); /* IE 9 */
   -webkit-transform: scale(1.1); /* Safari 3-8 */
    transform: scale(1.1);
}

    </style>
</head>
<body 
>
    <div class="wrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md 12">
                    <div class="mt-0 mb-3 clearfix">
                        <center>
                        <img src="image/logo.jpg" alt="">
                        <h2 class="pull-center">College Management System</h2>
                        </center>                    
                    </div>
                   </div>
            </div>
        </div>

        <hr style="height:2px;border-width:0;color:gray;background-color:gray"> </hr>

        <table>
                    <tr >
                    <td class="mt-5mb-3clearfix" >
                    Student Login <br> <br> 
                    <a href="login/student_login.php" >
                   
                        <img class="rounded mx-auto d-block" 
                        src="image/student.png" alt="" width=100px height=100px> </a> <br>
    </td><td>
Teacher Login <br> <br> 
                      <a href="login/teacher_login.php"> 
                        <img class="rounded mx-auto d-block" 
                        src="image/teacher.png" alt="" width=100px height=100px> </a>  <br> 
                        </td><td class="ml-5">        
                        Admin Login  <br> <br> 
                        <a href="login/admin_login.php"> 
                        <img class="rounded mx-auto d-block" 
                        src="image/admin.png" alt="" width=100px height=100px>  </a>    <br>
                    </div>
    </td>
    </tr>
    </table>


    </div>
    
    




    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });



        if (window.history && window.history.pushState) {
  window.history.pushState(null, null, window.location.href);
  window.onpopstate = function() {
    window.history.pushState(null, null, window.location.href);
  };
}





    </script>
</body>
</html>