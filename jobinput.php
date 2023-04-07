<?php
    $servername="localhost";
    $username="root";
    $password="";
    $database="resumeline";
    $conn=mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        echo "Not able to connect database";
        exit();
    }
    session_start();
    // $_SERVER['REQUEST_METHOD']='POST';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $email=$_SESSION['recmail'];
        $jobid=$_POST['jobid'];
        $role=$_POST['role'];
        $description=$_POST['description'];
        $cname=$_POST['cname'];
       
        $sql="insert into post values('$email','$jobid','$role','$description','$cname')";
        $result=mysqli_query($conn,$sql);
        if(!$result){
            echo "Please try again";
        }
        else{
            header("location:post.php");
        }
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
    <link rel="stylesheet" href="apply.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="post.css?v=<?php echo time() ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="post.js" defer></script>
</head>

<body>
    <div class="nav-bar">
        <div class="logo" style="cursor:pointer;">
            <p class="brand-name">ResumeLine.com</p>
        </div>
        <div class="nav-btn">
            <button onclick="location.href='/harendra/homepage.php';" class="nav-button bw-cb backw">HOME</button>
            <button class="nav-button bw-cb backw">ABOUT</button>
            <button onclick="location.href='/harendra/apply.php';" class="nav-button bw-cb backw">APPLY</button>
            <button onclick="location.href='/harendra/post.php';" class="nav-button bw-cb  ">POST</button>
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

    <div class="container">
        <form action="\harendra\jobinput.php" method="POST">

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                
            </div>
            <div class="mb-3">
                <label  for="exampleFormControlInput1" class="form-label">Job ID</label>
                <input name="jobid" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Job ID">
            </div>
            <div class="mb-3">
                <label  for="exampleFormControlInput1" class="form-label">Role</label>
                <input name="role" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Role">
            </div>
            <div class="mb-3">
                <label  for="exampleFormControlInput1" class="form-label">Company Name</label>
                <input name="cname" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Company Name">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button type="submit" name="jobbtn" class="rrr bw-cb backw post-new">Post</button>
        </form>
    </div>
</body>