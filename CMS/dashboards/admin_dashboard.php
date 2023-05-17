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
            width: 600px;
            margin: 40px auto;
            background-color: #fff;
           border-radius: 30px;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
</head>
<body style="background-image: url('../image/college.jpg');  background-repeat: no-repeat;
  background-size: fill;">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md 12">
                    <div class="mt-5mb-3clearfix">
                        <center>
                        <br><br>
          
                        <img src="../image/logo.jpg" alt="">
                        <h2 class="pull-center">College Management System</h2>
                        <font color="red">   <h4>Admin Dashboard</h4> </font>
                        </center>                    
                    </div>
                   </div>
            </div>
        </div>

        <hr style="height:2px;border-width:0;color:gray;background-color:gray"> </hr>

        <center>
    <a href="../student_module/student.php" class="btn btn-success ">Students</a>    
                    <a href="../teacher_module/teacher.php" class="btn btn-success ">Teachers</a>    
                    <a href="../attendence_module/" class="btn btn-success ">Attendance</a>    
                    <a href="../mark_module/mark_show.php" class="btn btn-success ">Marks</a>    
                    <a href="../note_module/note_show.php" class="btn btn-success ">Notes </a>    
                    <a href="../subject_module/subject_show.php" class="btn btn-success " rel="nofollow">Subjects</a>  
<br><br>
                    <a href="../index.php" class="btn btn-danger" rel="next">Logout</a>  
                  <br><br> 
                </center>      


    </div>
    

   
   

    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</body>
</html>