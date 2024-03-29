<?php
session_start();

if (!isset($_SESSION['username']))
{
    $_SESSION['msg'] = "You have to log in first";
    header('location: login');
}
// settinng variables
require_once "config.php";
clearstatcache();
$loggedInUsername = $_SESSION['username'];
$id = $_SESSION['id'];
$points_lvl = 200;
$points_dare = 100;
$lvlup = 1;
$answer_err = "";

//getting htmlno
$result = mysqli_query($link, "SELECT htmlno FROM users WHERE id =$id");
$result = mysqli_fetch_row($result);
$htmlno = $result[0]??null;
if($htmlno == 1){
    header('location: question-1');
}
if($htmlno == 2){
    header('location: question-2');
}
if($htmlno == 3){
    header('location: question-3');
}
if($htmlno == 4){
    header('location: question-4');
}
if($htmlno == 5){
    header('location: question-5');
}
if($htmlno !== 0){
    header('404.php');
}


//getting user lvl
$result = mysqli_query($link, "SELECT lvl FROM users WHERE id =$id");
$result = mysqli_fetch_row($result);
$level = $result[0]??null;
$_SESSION['level'] = $level;

//js stuff variable
$level_value=(isset($_SESSION['level']))?$_SESSION['level']:'';

//getting user ip
require_once "ip.php";
$_SESSION['ip'] = $ip;
?>

<html>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<head>

    <title>Crypt@trix | Ordina@trix 20.0</title>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100,200,300,400italic,500,100italic,700' rel='stylesheet' type='text/css'>
    <script src="fontawesome.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Dosis|Open+Sans|Special+Elite" rel="stylesheet">
    <link href='main.css' rel='stylesheet' type='text/css'>
    <link rel="icon" href="images/favicon.png" type="image/png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        //setting variables
        var yeet = '<?php echo $level_value; ?>';
        var username = '<?php echo $loggedInUsername; ?>';
        var kewl = '<?php echo $ip; ?>';
    </script>
</head>

<body onload="myFunction()">

    <!---  LOADER   --->

    <div class="load load-thanx" id="load">
        <center>
            <div class="loader-thanx">
                <h1>YOU SHOULDN'T HAVE DONE THAT...</h1>
            </div>
        </center>
    </div>

    <div class="mainBod" id="mainBod">

        <!---  NAVBAR   --->

        <div class="navbar">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <a href="index" class="logo-nav"><img src="images/ordin.png"></a>
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
        <?php if ($level == 0): ?>
        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 0</h2>
                    <p> Guess you gotta start somewhere</p>
                    <?php
    //Answer check -->
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $answer = "";

        if (empty($_POST["answer"]))
        {
            $answer_err = "Please enter an answer";
        }
        else
        {
            $answer = trim($_POST["answer"]);
        }

        if ($answer == "java")
        {
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points + $points_lvl, htmlno = 1 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-1');
        } else {
            $answer_err = "Wrong Answer!";
        }
    }
?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row question">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <input id="answer" placeholder="Answer" name="answer" type="text"><br>
                                <span class="red"><?php echo $answer_err ?><br></span>
                                <input id="submitb" type="submit" value="Submit">
                            </div>
                            <div class="col-md-2"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <?php
endif; ?>


        <!---  FOOTER   --->

        <div id="end">
            <center>
                <div class="footer-text">
                    <a href="https://discord.gg/GCbVdag" class="page-links discord" target="_blank"><i class="fab fa-discord"></i></a>
                    <a href="https://www.facebook.com/Ordinatrix20.0/" class="page-links facebook" target="_blank"><i class="fab fa-facebook-square"></i></a>
                    <a href="https://www.instagram.com/ordinatrix20.0/" class="page-links instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="mailto:ordinatrix10@gmail.com" class="page-links email" target="_blank"><i class="fas fa-envelope"></i></a>
                    <div class="footer-copy font-alt">
                        <a href="index">Home</a>
                        |
                        <a href="leaderboard">Leaderboard</a>
                        |
                        <a href="logout">Logout</a>
                        |
                        <a href="shop">Shop</a>
                        |
                        <a href="question-1">PlaY</a>
                    </div>
                    <div class="footer-copy font-alt">
                        © Pyrotech Club 2020
                    </div>
                </div>
            </center>
        </div>

    </div>
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-storage.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.16.1/firebase-analytics.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="init.js"></script>
    <script src="index.js"></script>
    <script src="logs.js"></script> 
</body>

</html>
