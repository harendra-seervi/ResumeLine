<?php
    session_start();
    if(isset($_SESSION['login'])){
        // echo $_SESSION['firstname'];
        //here we can dispaly the username of the person    
        // echo $_SESSION['firstname'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ResumeLine</title>
    <script src="https://kit.fontawesome.com/72d293837c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="homepage.css?v=<?php echo time() ?>">
    <script src="homepage.js" defer></script>
</head>
<body>
    <div class="social-media-nav ">
        <div class="call">
            <i class="fa-solid fa-phone m-social"></i>
            <p class="m-social" >Call : +91 861950XXXX</p>
        </div>
        <div class="social-icons">
            <i class="fa-brands fa-facebook m-social"></i>
            <i class="fa-brands fa-instagram m-social"></i>
            <i class="fa-brands fa-twitter m-social"></i>
            <i class="fa-brands fa-linkedin m-social"></i>
        </div>
        <div class="gmail">
            <i class="fa-regular fa-envelope m-social"></i>
            <p class="m-social">resumeline@gmail.com</p>
            <i class="fa-solid fa-xmark crosswala"></i>
        </div>
    </div>
    <div class="nav-bar">
        <div class="logo" style="cursor:pointer;">
            <p class="brand-name">ResumeLine.com</p>
        </div>
        <div class="nav-btn">
            <button onclick="location.href='/harendra/homepage.php';" class="nav-button bw-cb">HOME</button>    
            <button class="nav-button bw-cb backw">ABOUT</button>
            <button onclick="location.href='/harendra/apply.php';" class="nav-button bw-cb backw">APPLY</button>
            <button onclick="location.href='/harendra/post.php';" class= "nav-button bw-cb backw">POST</button>
            <?php
                if(isset($_SESSION['login'])){
                    echo "<button type='button' class='nav-button bw-cb login-logout backw'>logout</button>";
                    $fname=$_SESSION['firstname'];
                    echo "<span class='wel'>Hello! $fname</span>";
                }
                else{
                    echo "<button type='button' class='nav-button bw-cb login-logout backw'>Login/signup</button>";
                }
            ?>
            
            <!-- <i class="fa-solid fa-magnifying-glass search-icon"></i> -->
        </div>
    </div>
    <div class="tag-text">
        <p class="tag-line">Hiring Made Easy!</p>
        <p class="tag-bottom">Lorem ipsum dolor sit amet consectelat ipsa animi iusto voluptates ex ea labore repudiandae ipsum culpa?</p>
        <p class="tag-bottom">Lorem ipsx ea labore repudiandae ipsum culpa?</p>
        <div class="get-hired">
            <button  class="nav-button get-hired-btn kk" >GET HIRED</button>
        </div>
    </div>
    
</body>
</html>