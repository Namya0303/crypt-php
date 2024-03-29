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
if($htmlno == 0){
    header('location: question-0');
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
if($htmlno !== 1){
    header('404.html');
}


//getting user lvl
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
        <?php if ($level == 1): ?>
        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 1</h2>
                    <!--<p>abbaa aabaa babaa abbba aabbb abbab abbaa aabaa babaa aabbb abbab aaabb abaaa baaab</p> -->
                    <p>01101011 01110111 01110111 01110011 00111010<br>
00101111 00101111 01100101 01101100 01110111 <br>
01101111 01100010 00101110 01100110 01110010 <br> 
01110000 00101111 00111001 00111000 01001110 <br>
00111000 01101000 01001011</p>
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

        if ($answer == $loggedInUsername)
        {
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points + $points_lvl, htmlno = 2 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-2');
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
<?php if ($level == 6): ?>
        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 6</h2>
                    
                    <p>Money isn't the only thing he burns</p>
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

        if ($answer == "pabloescobar")
        {
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points + $points_lvl, htmlno = 2 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-2');
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

<?php if ($level == 11): ?>
        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 11</h2>
                    
                    <p>It is hard to separate the painting from the painter.</p>
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

        if ($answer == "moneyhunt")
        {
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points + $points_lvl, htmlno = 2 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-2');
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
        <?php endif; ?>

        
<?php if ($level == 16): ?>
        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 16</h2>
                    
                    <p>When L Ron Hubbard died where did he go?</p>
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

        if ($answer == "venus")
        {
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points + $points_lvl, htmlno = 2 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-2');
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
        <?php endif; ?>

        <?php if ($level == 21): ?>
        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 21</h2>
                    
                    <p>Once a label is on something<br>
It becomes an it<br>
Like it's no longer alive</p>
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

        if ($answer == "1925")
        {
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points + $points_lvl, htmlno = 2 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-2');
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
        <?php endif; ?>

        <?php if ($level == 26): ?>
        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 26</h2>
                    
                    <p>zfc8878<br>
// /// \// 4 3 2 5 <br>
myyux://nrlzw.htr/JsAJnB5 <br>
u0b3475 </p>
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

        if ($answer == "n88ap")
        {
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points + $points_lvl, htmlno = 2 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-2');
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
        <?php endif; ?>

        <?php if ($level == 31): ?>
        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 31</h2>
                    
                    <p>++++++++++[>+>+++>+++++++>++++++++++<<<<-]>>>++++++++.>+.++++++++++++++++.---.---.-.+++++.<-------.>----.-.---------.</p>
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

        if ($answer == "neuronsgone")
        {
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points + $points_lvl, htmlno = 2 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-2');
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
        <?php endif; ?>

        <?php if ($level == 36): ?>
        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 36</h2>
                    
                    <p>If being a neuroscientist wasn't enough, she is a psychiatrist as well</p>
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

        if ($answer == "beverlyhofstadter")
        {
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points + $points_lvl, htmlno = 2 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-2');
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
        <?php endif; ?>

        <?php if ($level == 41): ?>
        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 41</h2>
                    
                    <p>This the the creation of a fox named toby</p>
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

        if ($answer == "papyrus")
        {
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points + $points_lvl, htmlno = 2 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-2');
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
        <?php endif; ?>

        <?php if ($level == 46): ?>
        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 46</h2>
                    
                    <p>84 82 65 68 69 77 65 82 75</p>
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

        if ($answer == "aptivplc")
        {
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points + $points_lvl, htmlno = 2 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-2');
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
        <?php endif; ?>

        <?php if ($level == 51): ?>
        <div class="row home">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="writen center fade">
                    <h2>Question 51</h2>
                    
                    <p><img src="images/Q51.jpg" class="question-image"></p>
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

        if ($answer == "michealafton")
        {
            $sql = "UPDATE users SET lvl= lvl + $lvlup , points= points + $points_lvl, htmlno = 2 WHERE id=$id";
            // Prepare statement
            $stmt = $link->prepare($sql);
            // execute the query
            $stmt->execute();

            header('location: question-2');
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
