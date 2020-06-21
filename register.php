<?php 
//include config file
require_once "config.php";
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: dashboard.php");
  exit;
}
 

// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = "";
$username_err = $password_err = $confirm_password_err =  $email_err = "";

//processing form data when it is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a Username.";
    } else{
        //prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // SSet parameters
            $param_username = trim($_POST["username"]);

            //Execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if usernamee alreday exists
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Something went Wrong. Please try again.";
            }
        
            //Close statement
            mysqli_stmt_close($stmt);
        }
    }


    //validate Email Id
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an Email Id.";
    } else{
        //prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // SSet parameters
            $param_email = trim($_POST["email"]);

            //Execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email alreday exists
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email id is already linked to another account.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Something went Wrong. Please try again.";
            }
        
            //Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // VALIDATE PASSWORD
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters";
    }
    else{
        $password = trim($_POST["password"]);
    }

    // VALIDATE CONFIRM PASSWORD
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Passwords do not match.";
        }
    }


    //check input errors before inserting into database
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            //Bind variables to the prepared insert statementt as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            //set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            // Execute the prepared statment
            if(mysqli_stmt_execute($stmt)){
                //redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again.";
            }
            
            //Close Statement
            mysqli_stmt_close($stmt);
        }
    }

    //close connection
    mysqli_close($link);
}
?>
<html>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<head>

<title>Crypt@trix | Ordina@trix 20.0</title>

<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,400italic,500,100italic,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Dosis|Open+Sans" rel="stylesheet">
<link href='main.css' rel='stylesheet' type='text/css'>
<link rel="icon" href="images/favicon.png" type="image/png">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body onload="myFunction()">

    <!---  LOADER   --->

<div class="load" id="load">
    <center>
        <div class="loader">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </center>
</div>


<div class="mainBod" id="mainBod">

    <!---  NAVBAR   --->

<div class="navbar">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <a href="index.html" class="logo-nav"><img src="images/ordin.png"></a>
            <a class="button" href="https://discord.gg/3TH32ev" target="_blank">Join the Discord</a>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

    <!--- DARK MODE SWITCH --->

<div class="theme-switch-wrapper">
    <label class="theme-switch" for="checkbox">
        <input type="checkbox" id="checkbox" />
        <div class="slider round">
            <center>
                <img src="images/sun.png" class="sun">
                <img src="images/moon.png" class="moon">
            </center>
        </div>
    </label>
</div>

    <!--- HOME --->

<div class="row home fade">
    <div class="col-md-2"></div>
    <div class="col-md-4">
        <center>
            <img src="images/ordin2.png" class="img-logo invert">
        </center>
    </div>
    <div class="col-md-4">
        <div class="writen right">
            <h2>Register</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>"> 
                    <input name="username" type="text" placeholder="Username" value="<?php echo $username ; ?>"><br>
                    <span class="help-block"><?php echo $username_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                    <input name="email" type="email" placeholder="Email" value="<?php echo $email ; ?>"><br>
                    <span class="help-block"><?php echo $email_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                    <input placeholder="Password" name="password" type="password" value="<?php echo $password; ?>"> <br>
                    <span class="help-block"><?php echo $password_err; ?></span>
                </div>

                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                    <input placeholder="Confirm Password" name="confirm_password" type="password" value="<?php echo $confirm_password; ?>"><br>
                    <span class="help-block"><?php echo $confirm_password_err; ?></span>
                </div>

                    <p>Already have an account? <a class="blue" href="login.php">Login.</a></p><br><br>
                
                <div class="form-group">
                    <input class="button" type="submit" name="reg_user" value="Submit">
                </div>
            
            </form>
        </div>  
    </div>
    <div class="col-md-2"></div>
</div>

    <!---  FOOTER   --->

<div id="end">
    <center>
        <div class="footer-text">
            <a href="https://discord.gg/3TH32ev" class="page-links discord" target="_blank"><i class="fab fa-discord"></i></a>
            <a href="https://www.facebook.com/ordinatrix19.0/" class="page-links facebook" target="_blank"><i class="fab fa-facebook-square"></i></a>
            <a href="mailto:ordinatrix10@gmail.com" class="page-links email" target="_blank"><i class="fas fa-envelope"></i></a>
            <div class="footer-copy font-alt">
                <a href="index.php">Home</a>
                |
                <a href="leaderboard.php">Leaderboard</a>
                |
                <a href="login.php">Login</a>
                |
                <a href="register.php">Register</a>
                |
                <a href="question-1.php">PlaY</a>
            </div>
            <div class="footer-copy font-alt">
                © Pyrotech Club 2020
            </div>
        </div>
    </center>
</div>

</div>

<script src="index.js"></script>
</body>
</html>
