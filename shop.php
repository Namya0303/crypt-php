<?php 
session_start();

if (!isset($_SESSION['username']))
{
    $_SESSION['msg'] = "You have to log in first";
    header('location: login');
}

//setting variables 
require_once "config.php";
$loggedInUsername = $_SESSION['username'];
$id = $_SESSION['id'];
$lvlup = 1;
$skip_points = 350;

//checking if hint card is active
$result = mysqli_query($link, "SELECT hintca FROM users WHERE id =$id");
$result = mysqli_fetch_row($result);
$hintca = $result[0]??null;

//checking point balance
$result = mysqli_query($link, "SELECT points FROM users WHERE id =$id");
$result = mysqli_fetch_row($result);
$points = $result[0]??null;

//checking htmlno value
//getting htmlno
$result = mysqli_query($link, "SELECT htmlno FROM users WHERE id =$id");
$result = mysqli_fetch_row($result);
$htmlno = $result[0]??null;

// buy hint card function -->
    if(array_key_exists('hintt',$_POST)) {
    $sql = "UPDATE users SET hintca = 1, points= $points - 100 WHERE id=$id";
    // Prepare statement
    $stmt = $link->prepare($sql);
    // execute the query
    $stmt->execute();
    }
// Skip Level Function -->
    if(array_key_exists('skipp', $_POST)) {
        
        if($htmlno == 0){
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points- $skip_points, htmlno = 1 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();
        }
        if($htmlno == 1){
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points - $skip_points, htmlno = 2 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();
        }
        if($htmlno == 2){
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points - $skip_points, htmlno = 3 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();
        }
        if($htmlno == 3){
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points - $skip_points, htmlno = 4 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();
        }
        if($htmlno == 4){
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points - $skip_points, htmlno = 5 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();
        }
        if($htmlno == 5){
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points - $skip_points, htmlno = 1 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();
        }
}
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

        <div class="modals">
            <!--HINT CARD MODAL-->
            <div class="modal fade bd-example-modal-lg" id="hints" tabindex="-1" role="dialog" aria-labelledby="date-trigger" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title text-center" id="script">Are You Sure?</h2>
                            </div>
                            <div class="modal-body">
                                <h1>Do You Really Wanna Buy A Hint Card?</h1>
                                <h3>For the Hint, You Must Pay A Price Enough to Put you Far Behind On The Leaderboard</h3>
                                <h3>SO?????? ARE YOU WILLING TO PAY THE PRICE??</h3>
                                <div class="row">
                                <form method="post">
                                <button name="hintt" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" type="submit">I Need It</button></form> <button type="button" class="close" data-dismiss="modal" aria-label="Close">Eh, I'll Pass</button>
</div>
                            </div>
                            
                        </div>
                    </div>
                </div>

                <!-- SKIP CARD MODAL -->
                <div class="modal fade bd-example-modal-lg" id="yeet" tabindex="-1" role="dialog" aria-labelledby="date-trigger2" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title text-center" id="script">Are You Sure?</h2>
                            </div>
                            <div class="modal-body">
                                <h1>Do You Really Wanna SKIP THIS LEVEL?</h1>
                                <h3>TO SKIP THIS LEVEL, You Must Pay A Price Enough to Put you Far Behind On The Leaderboard</h3>
                                <h3>SO?????? ARE YOU WILLING TO PAY THE PRICE??</h3>
                                <div class="row">
                                <form method="post">
                                <button name="skipp" onclick="this.disabled=true;this.value='Submitting...'; this.form.submit();" type="submit">I Need It</button></form> <button type="button" class="close" data-dismiss="modal" aria-label="Close">Eh, I'll Pass</button>
</div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        

        <!---  NAVBAR   --->

        <div class="navbar">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <a href="index" class="logo-nav"><img src="images/ordin.png"></a>
                    <a class="button" href="https://discord.gg/GCbVdag" target="_blank">Join the Discord</a>
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

        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h3>Welcome to the shop</h3>
                    <p>You can buy a hint card or a skip card here to aid you in your endeavours.</p>
                    <?php if($hintca != 0) :?>
                        <p class="inv"><b>Inventory:</b><span> 1x Hint Card</span></p>     
                    <?php endif ?>
                    <div class="row">
                        <center>
                    
                        <!--HINT CARD-->
                        <?php if($hintca == 0 and $points >= 100) : ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-thing">
                                        <div class="card-front">
                                            <img src="images/hint.png">
                                        </div>
                                        <div class="card-back">
                                            <h4>Buy a Hint Card</h4>
                                            <p><b>Price-</b> 100 points</p><br>
                                            <button class="button" data-toggle="modal" id="date-trigger" data-target="#hints">Buy it</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($hintca != 0) : ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-thing">
                                        <div class="card-front invalid">
                                            <img src="images/hint.png" >
                                        </div>
                                        <div class="card-back invalid">
                                            <h4>Buy a Hint Card</h4>
                                            <p><b>Price-</b> 100 points</p><br>
                                            <button class="button" data-toggle="modal" id="date-trigger" data-target="#hints" disabled>You Already Have a Hint Card</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if($points < 100 and $hintca == 0 ) : ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-thing">
                                        <div class="card-front invalid">
                                            <img src="images/hint.png">
                                        </div>
                                        <div class="card-back invalid">
                                            <h4>Buy a Hint Card</h4>
                                            <p><b>Price-</b> 100 points</p><br>
                                            <button class="button" data-toggle="modal" id="date-trigger" data-target="#hints" disabled>Insufficiant Funds:(</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!--SKIP CARD-->
                        <?php if($points >= 350) : ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-thing">
                                        <div class="card-front">
                                            <img src="images/skip.png">
                                        </div>
                                        <div class="card-back">
                                            <h4>Buy a Skip Card</h4>
                                            <p><b>Price-</b> 350 points</p><br>
                                            <button class="button" data-toggle="modal" id="date-trigger2" data-target="#yeet">Buy it</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php if($points < 350) : ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-thing">
                                        <div class="card-front invalid">
                                            <img src="images/skip.png">
                                        </div>
                                        <div class="card-back invalid">
                                            <h4>Buy a Skip Card</h4>
                                            <p><b>Price-</b> 350 points</p><br>
                                            <button class="button" disabled>Insufficiant Funds:(</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>

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
                        <a href="rules">Rules</a>
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
    <script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-storage.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-analytics.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="init.js"></script>
    <script src="index.js"></script>
</body>

</html>