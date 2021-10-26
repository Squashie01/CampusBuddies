<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>


    <link rel="shortcut icon" type="image" href="../images/CampusBuddyNoText.png">

    <title> Campus Buddy | Student Profile </title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <!-- This is the Navigation Bar -->
    <nav class="navbar">       

        <div id="sidebar">
            <div class="toggle-btn" onclick ="show()">
            <div id="openMenu"><i class="fa fa-bars"></i></div>
            </div>

            <div class="closeMenu" onclick ="hide()"><i class="fa fa-times"></i></div>

            <ul>
            <li>Home</li>
            <li>Student Support</li>
            <a href="StudentProfile.html"> <li class="active">Student ID Profile</li> </a>
            <li>Semester Calendar</li>
            <li>Library</li>
            </ul>
        </div>

        <div class="NotificationAndSettings">
            <div> <i class="fas fa-bell"></i> </div>
            <div> <i class="fas fa-cog"></i> </div>
        </div>
    </nav>

    <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "campus_buddies";
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $qry="SELECT StudentID, First_Name, Last_name, Picture  FROM student";
        $result=mysqli_query ($conn, $qry);

        $didTheyLogIn="n";
        $firstName="default";
        $lastName = "default";
        $picture = "default";
        $studentId=$_SESSION['id'];

        //this checks for if they are a student
        while($row = $result ->fetch_assoc())
        {
            if($studentId == $row["StudentID"]) 
            {
                $firstName = $row["First_Name"];
                $lastName = $row["Last_name"];
                $picture=$row["Picture"];
                $didTheyLogIn = "y";
                //echo "this works";
               // echo $row["First_Name"];
            }
        }

        //this checks to see if they are a teacher
        if($didTheyLogIn == "n")
        {
            $qry="SELECT TeacherId , First_Name  FROM teacher";
            $result=mysqli_query ($conn, $qry);

            while($row = $result ->fetch_assoc())
            {
                if($studentId == $row["TeacherId"]) 
                {
                    $firstName = $row["First_Name"];
                    $didTheyLogIn = "y";
                }
            }
        }

        //this is if a user tried to enter without loging in 
        if ($didTheyLogIn == "n")
        {
            header("location: ../php/logout.php");
        }
        /*
        if($didTheyLogIn == "n")
        {
            $qry="SELECT TeacherId , First_Name  FROM teacher";
            $result=mysqli_query ($conn, $qry);

            while($row = $result ->fetch_assoc())
            {
                if($studentId == $row["TeacherId"]) 
                {
                    $firstName = $row["First_Name"];
                    $didTheyLogIn = "y";
                }
                else 
                {
                $didTheyLogIn = "n";
                }
            }

        }

        if($didTheyLogIn == "n")
        {
            session_destroy();
            session_start();
            $_SESSION['login_error']="y";
            //header("location: ../code/login.php");
        }
        */

        /* This is the section below the nav bar */
        echo
        '
            <div class="StudentInfo">
                <div class="StudentProfileImage">
                    <img src="' . $picture . '" alt="">
                </div>
                <div class="BasicStudentInfo">
                    <span class="StudentName"> '. $firstName . ' ' . $lastName . ' </span>
                    <span class="StudentType"> Full-Time Student </span>
                    <div class="roleDiv">+ Role</div>
                </div>
            </div>
        '
    ?>

    

    <div class="StudentProfileInfo">
        <div class="MoreStudentInfo">
            <span class="InfoHeader"> My Programme </span>
            <span class="InfoTitle"> Bachelor Degree in Graphic Design </span>
            <span class="InfoHeader"> Core Subjects </span>
            <span class="YearAndSemester"> Year 1, Semester 1 </span>
    
            <!-- Swiper -->
            <div class="swiperContainer mySwiper ExerciseSwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="MenuImg" src="../images/Personal Profile Page Icons/Graphic Design Icon.svg" alt="">
                        <span class="MenuSpan"> Breakfast Menu </span>
                    </div>
                    <div class="swiper-slide">
                        <img class="MenuImg" src="../images/Personal Profile Page Icons/Typography Icon.svg" alt="">
                        <span class="MenuSpan"> Lunch Menu </span>
                    </div>
                    <div class="swiper-slide">
                        <img class="MenuImg" src="../images/Personal Profile Page Icons/Interelated Media Icon.svg" alt="">
                        <span class="MenuSpan"> Dessert Menu </span>
                    </div>
                    <div class="swiper-slide">
                        <img class="MenuImg" src="../images/Personal Profile Page Icons/Modern & Contemp Art Icon.svg" alt="">
                        <span class="MenuSpan"> Drink Menu </span>
                    </div>
                </div>
            </div>  
    
            <div class="TimeTable">
                <span> Timetable </span>
                <img src="../images/pdf.png" alt="">
            </div>
        </div>
        
    </div>

    <!-- Bottom Navigation Bar -->
    <div class="bottomNavBar">
        <ul class="BottomNavUl">
            <li class="borderSettings"> <a href="#"> <i class="fas fa-exclamation-triangle"></i> </a> </li>
            <li class="borderSettings"> <a href="Homepage.php"> <i class="fas fa-home"></i> </a> </li>
            <li class="borderSettings"> <a href="#"> <i class="far fa-calendar-alt"></i> </a> </li>
            <li class="borderSettings"> <a href="#"> <i class="fas fa-bell"></i> </a> </li>
        </ul>
    </div>

    <script src="../js/navBar.js"></script>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 4,
          spaceBetween: 15,
          loop: true,
        });
      </script>
    

</body>
</html>