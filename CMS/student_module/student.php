<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Student Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 1000px;
            margin: 40px auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md 12">
                    <div class="mt-5mb-3clearfix">
                   
                    <a href="student_create.php" class="btn btn-success pull-right">
                        
                    <i class="fa fa-plus"></i> 
                    
                    
                    Register a new Student
                
                </a>

                  
                        <h2 class="pull-left">Student Details</h2>
                    </div>
                    <?php
                    require_once "../connection/connect.php";
                    $sql = "select * from student ";
                    if($result = mysqli_query($link,$sql)){
                        if(mysqli_num_rows($result)>0){

                            
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Registration number</th>";
                                        echo "<th>Branch</th>";
                                        echo "<th>email</th>";
                                        echo "<th>Phone</th>";
                                        echo "<th>Address</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while ($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['registration'] . "</td>";
                                        echo "<td>" . $row['branch'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['phone'] . "</td>";
                                        echo "<td>" . $row['address'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="student_profile.php?id='.$row['id']. ' " class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="student_update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a  href="student_delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip" ><span class="fa fa-trash text-danger "></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            mysqli_free_result($result);
                        } else{
                            
                            
                            echo '
                              
                            <br><br><br>
                            
                            <div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }


                   
                    // Close connection
                    mysqli_close($link);
                    ?>
                    

                    <a href="../dashboards/admin_dashboard.php" class="btn btn-success pull-left">Home</a>


                </div>
            </div>

        </div>
    </div>
    
</body>
</html>