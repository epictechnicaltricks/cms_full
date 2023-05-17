<?php
// Include config file
require_once "../connection/connect.php";
 
// Define variables and initialize with empty values
$name = $registration = $branch = $email = $phone = $dob = $address = "";
$name_err = $registration_err = $branch_err = $email_err = $phone_err = $dob_err = $address_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    
    // Validate registration
    $input_registration = trim($_POST["registration"]);
    if(empty($input_registration)){
        $registration_err = "Please enter the registration no.";     
    } elseif(!ctype_digit($input_registration)){
        $registration_err = "Please enter a correct registration no.";
    } else{
        $registration = $input_registration;
    }

    // Validate branch
    $input_branch = trim($_POST["branch"]);
    if(empty($input_branch)){
        $branch_err = "Please enter a branch.";     
    } else{
        $branch = $input_branch;
    }
    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter a email.";     
    } else{
        $email = $input_email;
    }

    // Validate phone
    $input_phone = trim($_POST["phone"]);
    if(empty($input_phone)){
        $phone_err = "Please enter the phone no.";     
    } elseif(!ctype_digit($input_phone)){
        $phone_err = "Please enter a correct phone no.";
    } else{
        $phone = $input_phone;
    }

    // Validate dob
    $input_dob = trim($_POST["dob"]);
    if(empty($input_dob)){
        $dob_err = "Please enter the Date of Birth.";     
    } else{
        $dob = $input_dob;
    }


    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($registration_err) && empty($branch_err) && empty($email_err) && empty($phone_err) && empty($dob_err) && empty($address_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO student (name, registration, branch, email, phone, dob, address) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
          echo  mysqli_stmt_bind_param($stmt, "sssssss", $param_name, $param_registration, $param_branch, $param_email, $param_phone, $param_dob, $param_address);
            
            // Set parameters
            $param_name = $name;
            $param_registration = $registration;
            $param_branch = $branch;
            $param_email = $email;
            $param_phone = $phone;
            $param_dob = $dob;
            $param_address = $address;
            
          
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: student.php");
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
    <title>Create Teacher Record</title>
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
                    <h2 class="mt-5">Create Student Record</h2>
                    <p>Please fill this form and submit to add Student record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Registration number</label>
                            <input type="number" name="registration" class="form-control <?php echo (!empty($registration_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $registration; ?>">
                            <span class="invalid-feedback"><?php echo $registration_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Branch</label>
                            <input type="text" name="branch" class="form-control <?php echo (!empty($branch_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $branch; ?>">
                            <span class="invalid-feedback"><?php echo $branch_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Email id</label>
                            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" data-date-format="yyyy-mm-dd" class="form-control <?php echo (!empty($dob_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $dob; ?>" >
                            <span class="invalid-feedback"><?php echo $dob_err;?></span>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>"><?php echo $address; ?></textarea>
                            <span class="invalid-feedback"><?php echo $address_err;?></span>
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="student.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>