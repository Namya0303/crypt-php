<?php 
session_start();

if (!isset($_SESSION['username'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    header('location: login.php'); 
} 
// get current logged in user level
require_once "config.php";
$loggedInUsername = $_SESSION['username'];
$id = $_SESSION['id'];
$result = mysqli_query($link, "SELECT lvl FROM users WHERE id =$id");
$result = mysqli_fetch_row($result);
$level = $result[0]??null;
?>

<html>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<head>

    <title>Crypt@trix | Ordina@trix 20.0</title>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,400italic,500,100italic,700' rel='stylesheet' type='text/css'>
    <script src="fontawesome.js"></script>
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
                    <a href="index.php" class="logo-nav"><img src="images/ordin.png"></a>
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
        <?php if($level == 0) :?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 0</h2>
                    <p> Chal na bey</p>
                    <?php 
            //Answer check -->
            if($_SERVER["REQUEST_METHOD"] == "POST"){
            $answer = $answer_err = "";

                if(empty($_POST["answer-1"])){
                    $answer_err = "Please enter an answer";
                } else{
                    $answer = trim($_POST["answer-1"]);
                }

                if($answer == "lorem"){
                    $sql = "UPDATE users SET lvl= $level+1 , points= +200 WHERE id=$id";
                    // Prepare statement
                    $stmt = $link->prepare($sql);
                    // execute the query
                    $stmt->execute();
                }
            }
            ?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input placeholder="Answer" name="answer-1" type="text"><br>
                                <span class="red"><?php echo $answer_err ?><br></span>
                                <input class="button" type="submit" value="Submit">
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <?php endif; ?>

        <?php if($level == 1) :?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 1</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing. The basic text variety</p>
                    <?php 
            //Answer check -->
            if($_SERVER["REQUEST_METHOD"] == "POST"){
            $answer = $answer_err = "";

                if(empty($_POST["answer-2"])){
                    $answer_err = "Please enter an answer";
                } else{
                    $answer = trim($_POST["answer-2"]);
                }

                if($answer == "ipsum"){
                    $sql = "UPDATE users SET lvl= +1 , points= +200 WHERE id=$id";
                    // Prepare statement
                    $stmt = $link->prepare($sql);
                    // execute the query
                    $stmt->execute();
                }
            }
            ?>
                    <form>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input placeholder="Answer" name="answer-2" type="text"><br>
                                <span class="red"><?php echo $answer_err ?><br></span>
                                <input class="button" type="submit" value="Submit">
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <?php endif; ?>

        <?php if($level == 3) :?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 3</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing. The basic text variety</p>
                    <?php 
            //Answer check -->
            if($_SERVER["REQUEST_METHOD"] == "POST"){
            $answer = $answer_err = "";

                if(empty($_POST["answer-3"])){
                    $answer_err = "Please enter an answer";
                } else{
                    $answer = trim($_POST["answer-3"]);
                }

                if($answer == "lorem"){
                    $sql = "UPDATE users SET lvl= +1 , points= +200 WHERE id=$id";
                    // Prepare statement
                    $stmt = $link->prepare($sql);
                    // execute the query
                    $stmt->execute();
                }
            }
            ?>
                    <form>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input placeholder="Answer" name="answer-3" type="text"><br>
                                <span class="red">Wrong Answer<br></span>
                                <input class="button" type="submit" value="Submit">
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <?php endif; ?>

        <!---  FOOTER   --->

        <div id="end">
            <center>
                <div class="footer-text">
                    <a href="https://discord.gg/GCbVdag" class="page-links discord" target="_blank"><i class="fab fa-discord"></i></a>
                    <a href="https://www.facebook.com/Ordinatrix20.0/" class="page-links facebook" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://www.instagram.com/ordinatrix20.0/" class="page-links instagram" target="_blank"><i class="fab fa-instagram"></i></a>
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