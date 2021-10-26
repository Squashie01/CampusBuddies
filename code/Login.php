<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="shortcut icon" type="image" href="../images/CampusBuddyNoText.png">

    <title> Campus Buddy | Login </title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="backButton">
        <a href="index.html">
            <i class="fas fa-chevron-left" style="color:black"></i>
        </a>
    </div>

    <div class="LoginHeader">
        <span> Login </span>
    </div>

    <?php
                session_start();
                $badLogin=$_SESSION['login_error'];
                if($badLogin == "y")
                {
                    //this is if they get a wrong password
                    echo
                    "
                    <div class='LoginForm'>
                        <form action='../php/login.php' method='post'>
                            <input type='text' name='studentId' placeholder='Student ID'> <br>
                            <br>
                            <input type='password' name='uPassword' placeholder='Password'> <br>
                            <br>
                            <br>
                            <button  type='submit' id='buttonCSS'> Login </button>  </div>
                        </form>
                    </div>
                    " . "your login creduntuals are wrong";
                }
                else
                {
                    //this is the first thing they see before attempting to log in
                    echo
                    "
                    <div class='LoginForm'>
                        <form action='../php/login.php' method='post'>
                            <input type='text' name='studentId' placeholder='Student ID'> <br>
                            <br>
                            <input type='password' name='uPassword' placeholder='Password'> <br>
                            <br>
                            <br>
                            <button  type='submit' id='buttonCSS'> Login </button>  </div>
                        </form>
                    </div>
                    ";
                }
                $_SESSION['login_error']="n";
            ?>

    <div class="LoginLogo">
        <img src="../images/CampusBuddiesTextLogo.png" alt="Campus Buddies Text Logo">
    </div>
</body>
</html>