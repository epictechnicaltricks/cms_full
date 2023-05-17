<?php
// Include config file
require_once "../connection/connect.php";
 
// Define variables and initialize with empty values
$cg = $db = $web = $ai = $ml = $ds = $student_id = "";
$cg_err = $db_err = $web_err = $ai_err = $ml_err = $ds_err = $student_id_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    // Validate cg
    $input_cg = trim($_POST["cg"]);
    if(empty($input_cg)){
        $cg_err = "Please enter a cg.";
    } elseif(!filter_var($input_cg, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $cg_err = "Please enter a valid cg.";
    } else{
        $cg = $input_cg;
    }
    
    
    // Validate db
    $input_db = trim($_POST["db"]);
    if(empty($input_db)){
        $db_err = "Please enter the db.";     
    } elseif(!($input_db)){
        $db_err = "Please enter a correct db";
    } else{
        $db = $input_db;
    }

    // Validate web
    $input_web = trim($_POST["web"]);
    if(empty($input_web)){
        $web_err = "Please enter a web.";     
    } else{
        $web = $input_web;
    }
    // Validate ai
    $input_ai = trim($_POST["ai"]);
    if(empty($input_ai)){
        $ai_err = "Please enter a ai.";     
    } else{
        $ai = $input_ai;
    }

    // Validate ml
    $input_ml = trim($_POST["ml"]);
    if(empty($input_ml)){
        $ml_err = "Please enter the ml no.";     
    } elseif(!ctype_digit($input_ml)){
        $ml_err = "Please enter a correct ml no.";
    } else{
        $ml = $input_ml;
    }

    // Validate ds
    $input_ds = trim($_POST["ds"]);
    if(empty($input_ds)){
        $ds_err = "Please enter the ds";     
    } else{
        $ds = $input_ds;
    }


    // Validate student_id
    $input_student_id = trim($_POST["student_id"]);
    if(empty($input_student_id)){
        $student_id_err = "Please enter an student_id.";     
    } else{
        $student_id = $input_student_id;
    }
    
    // Check input errors before inserting in database
    if(empty($cg_err) && empty($db_err) && empty($web_err) && empty($ai_err) && empty($ml_err) && empty($ds_err) && empty($student_id_err)){
        // Prepare an insert statement
       
       
        $sql = "INSERT INTO mark (cg, db, web, ai, ml, ds, student_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
          echo  mysqli_stmt_bind_param($stmt, "sssssss", $param_cg, $param_db, $param_web, $param_ai, $param_ml, $param_ds, $param_student_id);
            
            // Set parameters
            $param_cg = $cg;
            $param_db = $db;
            $param_web = $web;
            $param_ai = $ai;
            $param_ml = $ml;
            $param_ds = $ds;
            $param_student_id = $student_id;
            
          
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: teacher.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MARK ADD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">STUDENT MARK PUBLISH</h2>
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


                         <div class="form-group">
                            <label>Student Registration No</label>
                            <input type="number" name="student_id" class="form-control <?php echo (!empty($student_id_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $student_id; ?>">
                            <span class="invalid-feedback"><?php echo $student_id_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Computer Graphic</label>
                            <input type="text" name="cg" class="form-control <?php echo (!empty($cg_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $cg; ?>">
                            <span class="invalid-feedback"><?php echo $cg_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Database Design</label>
                            <input type="text" name="db" class="form-control <?php echo (!empty($db_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $db; ?>">
                            <span class="invalid-feedback"><?php echo $db_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Web Development</label>
                            <input type="text" name="web" class="form-control <?php echo (!empty($web_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $web; ?>">
                            <span class="invalid-feedback"><?php echo $web_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Artificial Inteligency</label>
                            <input type="ai" name="ai" class="form-control <?php echo (!empty($ai_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ai; ?>">
                            <span class="invalid-feedback"><?php echo $ai_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Machine Learning</label>
                            <input type="number" name="ml" class="form-control <?php echo (!empty($ml_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ml; ?>">
                            <span class="invalid-feedback"><?php echo $ml_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Data Science</label>
                            <input type="number" name="ds" class="form-control <?php echo (!empty($ds_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ds; ?>" >
                            <span class="invalid-feedback"><?php echo $ds_err;?></span>
                        </div>

                     
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="teacher.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>