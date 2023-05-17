<?php
require_once "../connection/connect.php";

$name = $address = $email = $phone ="";
$name_err = $address_err = $email_err = $phone_err ="";

if(isset($_POST["id"]) && !empty($_POST["id"])){

    $id = $_POST["id"];

    // name update
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    // registration update
    $input_registration = trim($_POST["registration"]);
    if(empty($input_registration)){
        $registration_err = "Please enter the registration no.";     
    } elseif(!ctype_digit($input_registration)){
        $registration_err = "Please enter a correct registration no.";
    } else{
        $registration = $input_registration;
    }

    // branch update
    $input_branch = trim($_POST["branch"]);
    if(empty($input_branch)){
        $branch_err = "Please enter a branch.";     
    } else{
        $branch = $input_branch;
    }

    //emailid update
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err="Please input an email.";
    } else{
        $email = $input_email;
    }

       // phone update
       $input_phone = trim($_POST["phone"]);
       if(empty($input_phone)){
           $phone_err = "Please enter an address.";     
       } else{
           $phone = $input_phone;
       }

    //  address update
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    



    // check input error before inserting into database
    if(empty($name_err) && empty($registration_err) && empty($branch_err) && empty($email_err) && empty($phone_err) && empty($address_err)){

        $sql ="UPDATE student SET name=?, registration=?, branch=?, email=?, phone=?, address=? WHERE id=?";

        if($stmt = mysqli_prepare($link,$sql)){
            // bind variables to prepare statement as parameters
            mysqli_stmt_bind_param($stmt,"ssssssi", $param_name, $param_registration, $param_branch, $param_email, $param_phone, $param_address, $param_id);

            //set parameters
            $param_name = $name ;
            $param_registration = $registration;
            $param_branch = $branch;
            $param_email = $email ;
            $param_phone = $phone ;
            $param_address = $address ;
            $param_id = $id ;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: student.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again.";
            }
        }

        // close statement
        mysqli_stmt_close($stmt);
    }

    //close connection
    mysqli_close($link);

} else{
    //check existence of id parameter 
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        $sql ="SELECT * FROM student WHERE id=?";
        if($stmt = mysqli_prepare($link,$sql)){
            mysqli_stmt_bind_param($stmt,"i",$param_id);

            //set parameter
            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result)==1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Retrive indivisual field values
                    $name = $row["name"];
                    $registration = $row["registration"];
                    $branch = $row["branch"];
                    $email = $row["email"];
                    $phone = $row["phone"];
                    $address = $row["address"];
                } else{
                    header("location: error.php");
                    exit();
                }
            } else{
                echo "Oops! Something went wrong. Please try again.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);

    } else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                    <h2 class="mt-5">Update Student Record</h2>
                    <p>Please edit the input values and submit to update the student record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Branch</label>
                            <input type="text" name="branch" class="form-control <?php echo (!empty($branch_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $branch; ?>">
                            <span class="invalid-feedback"><?php echo $branch_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Registration</label>
                            <input type="number" name="registration" class="form-control <?php echo (!empty($registration_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $registration; ?>">
                            <span class="invalid-feedback"><?php echo $registration_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email id</label>
                            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../dashboard.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>