<?php
session_start();

if (!isset($_SESSION['username'])) { 
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
if($htmlno == 0){
    header('location: question-0');
}
if($htmlno == 1){
    header('location: question-1');
}
if($htmlno == 2){
    header('location: question-2');
}
if($htmlno == 3){
    header('location: question-3');
}
if($htmlno == 5){
    header('location: question-5');
}
if($htmlno !== 4){
    header('404.html');
}

//getting user lvl
$result = mysqli_query($link, "SELECT lvl FROM users WHERE id =$id");
$result = mysqli_fetch_row($result);
$level = $result[0]??null;


//getting user
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

        <?php if ($level == 4): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 4</h2>
                    <p><img src="images/pehleistimalkareinfirvishwaskarein.png" ></p>
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

        if ($answer == "angel")
        {
            $sql = "UPDATE users SET lvl = lvl + $lvlup , points= points + $points_lvl, htmlno = 5 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-5');
        }
        else
        {
            $answer_err = "Wrong Answer! Please try again.";
        }
    }
?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
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
        <?php endif; ?>

        <?php if ($level == 9): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 9</h2>
                    <p>2010....The place of kings</p>
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

        if ($answer == "ranthambore")
        {
            $sql = "UPDATE users SET lvl = lvl + $lvlup , points= points + $points_lvl, htmlno = 5 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-5');
        }
        else
        {
            $answer_err = "Wrong Answer! Please try again.";
        }
    }
?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
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
        <?php endif; ?>

        <?php if ($level == 14): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 14</h2>
                    <img src="images/yeet.png" class="question-image">
                    <p>uggcf://lbhgh.or/jFDf1b5vkrt</p>
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

        if ($answer == "biden")
        {
            $sql = "UPDATE users SET lvl = lvl + $lvlup , points= points + $points_lvl, htmlno = 5 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-5');
        }
        else
        {
            $answer_err = "Wrong Answer! Please try again.";
        }
    }
?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
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
        <?php endif; ?>

        <?php if ($level == 19): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 19</h2>
                    <img src="images/kaanta.jpg" class="question-image">
                    <p>Always Watching</p>
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

        if ($answer == "totheark")
        {
            $sql = "UPDATE users SET lvl = lvl + $lvlup , points= points + $points_lvl, htmlno = 5 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-5');
        }
        else
        {
            $answer_err = "Wrong Answer! Please try again.";
        }
    }
?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
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
        <?php endif; ?>
        
        <?php if ($level == 24): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 24</h2>
                <p>Troubled and tortured his limbs regrow. It changed something for sure.</p>
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

        if ($answer == "marieantoinettesyndrome")
        {
            $sql = "UPDATE users SET lvl = lvl + $lvlup , points= points + $points_lvl, htmlno = 5 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-5');
        }
        else
        {
            $answer_err = "Wrong Answer! Please try again.";
        }
    }
?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
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
        <?php endif; ?>

        <?php if ($level == 29): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 29</h2>
                <p>It's always right... https://imgur.com/a/GbIfQGZ . The answer is the key Ixngfg</p>
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

        if ($answer == "oneplusnord")
        {
            $sql = "UPDATE users SET lvl = lvl + $lvlup , points= points + $points_lvl, htmlno = 5 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-5');
        }
        else
        {
            $answer_err = "Wrong Answer! Please try again.";
        }
    }
?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
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
        <?php endif; ?>

        <?php if ($level == 34): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 34</h2>
                <p>He is the best YouTuber!!!!</p>
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

        if ($answer == "dad")
        {
            $sql = "UPDATE users SET lvl = lvl + $lvlup , points= points + $points_lvl, htmlno = 5 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-5');
        }
        else
        {
            $answer_err = "Wrong Answer! Please try again.";
        }
    }
?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
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
        <?php endif; ?>

      

        <?php if ($level == 39): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 39</h2>
                <p>First one to be trapped forever,He won’t escape till 3 years</p>
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

        if ($answer == "alby")
        {
            $sql = "UPDATE users SET lvl = lvl + $lvlup , points= points + $points_lvl, htmlno = 5 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-5');
        }
        else
        {
            $answer_err = "Wrong Answer! Please try again.";
        }
    }
?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
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
        <?php endif; ?>

        <?php if ($level == 44): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 44</h2>
                <p>LP, JT, EB, RB, JM, SB, DV</p>
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

        if ($answer == "stoll")
        {
            $sql = "UPDATE users SET lvl = lvl + $lvlup , points= points + $points_lvl, htmlno = 5 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-5');
        }
        else
        {
            $answer_err = "Wrong Answer! Please try again.";
        }
    }
?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
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
        <?php endif; ?>

        <?php if ($level == 49): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 49</h2>
                <p>The 6th labour's dung is deadly, Pqe op Fqp tz Vcd</p>
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

        if ($answer == "deimos")
        {
            $sql = "UPDATE users SET lvl = lvl + $lvlup , points= points + $points_lvl, htmlno = 5 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-5');
        }
        else
        {
            $answer_err = "Wrong Answer! Please try again.";
        }
    }
?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
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
        <?php endif; ?>

        <?php if ($level == 54): ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 54</h2>
                <p><span style="color:orange;">thr</span>oop</p>
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

        if ($answer == "kwipke")
        {
            $sql = "UPDATE users SET lvl = lvl + $lvlup , points= points + $points_lvl, htmlno = 5 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-5');
        }
        else
        {
            $answer_err = "Wrong Answer! Please try again.";
        }
    }
?>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="row">
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
                        <a href="index">Home</a>
                        |
                        <a href="leaderboard">Leaderboard</a>
                        |
                        <a href="login">Login</a>
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