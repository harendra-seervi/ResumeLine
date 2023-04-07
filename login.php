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
    $founds=0;
    $foundr=0;  
    $stuornot=3;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['sbtn'])){
            $stuornot=1;
            // student login
            $email=$_POST['stuemail'];
            $password=$_POST['stupassword'];
            
            $sql="select email from student where email='$email' and password='$password'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($result);
            if($row==1){
                $founds=1;
                $sql="select *from student where email='$email'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                $fname=$row['firstname'];
                session_start();
                $_SESSION['firstname']=$fname;
                $_SESSION['smail']=$email;
                $_SESSION['isstudent']=true;
                $_SESSION['login']=true;
                header("location: homepage.php");
            }
            else{
                $founds=0;
            }
        }
        else{
            // recruiter login
            $stuornot=0;
            $email=$_POST['recemail'];
            $password=$_POST['recpassword'];
            
            $sql="select email from recruiter where email='$email' and password='$password'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_num_rows($result);
            if($row==1){
                $foundr=1;
                $sql="select *from recruiter where email='$email'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                $fname=$row['firstname'];
                session_start();
                $_SESSION['firstname']=$fname;
                $_SESSION['isstudent']=false;
                $_SESSION['login']=true;
                $_SESSION['recmail']=$_POST['recemail'];
                header("location: homepage.php");
            }
            else{
                $foundr=0;
            }
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <script src="login.js" defer></script>
    <link rel="stylesheet" href="login.css?v=<?php echo time() ?>">

</head>
<body>
    <form action="\harendra\login.php" method="post" >
        <div class="container">
            <div class="logo">
                <img class="logo-img"src="logowhite.png" alt="image not found">
            </div>
            <div class="login-both">
                <div class="student">
                    <div class="upper-login-name">
                        <div class="both-name">
                            <h3>Login Student</h3>
                            <h5>(Please login to continue)</h5>
                        </div>
                        <button class="continue"  ><a href="\harendra\createstudent.php">Create Student Account</a>  </button>
                    </div>
                    <div class="input-box">
                        <input autocomplete="off" name="stuemail" class="inp" type="email" placeholder="Enter gmail">
                        <input autocomplete="off" name="stupassword" class="inp" type="password" placeholder="Password">
                    </div>
                    <div class="alive">
                        <div class="alive-below">
                            <input type="checkbox" name="keep-me-login" id="">
                            <p style="margin-left:4px">Keep Me Logged In</p>
                        </div>                      <a href="https:\\youtube.com">Forgot Password?</a>
                    </div>
                    <div class="btn-section">
                        <?php
                            if($stuornot==1){
                                if($founds==0){
                                    echo "<h5 style='font-weight:500; color:red; scale:1.5; margin-bottom:10px;' >[ Invalid email or password] </h5>";
                                    $stuornot=3;
                                }
                            }
                        ?>
                        <button name="sbtn" class="btn-login" >LOGIN</button>
                        <p>Or</p>
                        <p>Login with</p>
                        <div class="social-media">
                            <svg class="cp" stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                                c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
                                c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
                                C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
                                c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
                                c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path></svg>
                                <svg class="cp" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm215.3 337.7c.3 4.7.3 9.6.3 14.4 0 146.8-111.8 315.9-316.1 315.9-63 0-121.4-18.3-170.6-49.8 9 1 17.6 1.4 26.8 1.4 52 0 99.8-17.6 137.9-47.4-48.8-1-89.8-33-103.8-77 17.1 2.5 32.5 2.5 50.1-2a111 111 0 0 1-88.9-109v-1.4c14.7 8.3 32 13.4 50.1 14.1a111.13 111.13 0 0 1-49.5-92.4c0-20.7 5.4-39.6 15.1-56a315.28 315.28 0 0 0 229 116.1C492 353.1 548.4 292 616.2 292c32 0 60.8 13.4 81.1 35 25.1-4.7 49.1-14.1 70.5-26.7-8.3 25.7-25.7 47.4-48.8 61.1 22.4-2.4 44-8.6 64-17.3-15.1 22.2-34 41.9-55.7 57.6z"></path></svg>
                                <svg class="cp" stroke="currentColor" fill="currentColor" stroke-width="0" role="img" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title></title><path d="M23.9981 11.9991C23.9981 5.37216 18.626 0 11.9991 0C5.37216 0 0 5.37216 0 11.9991C0 17.9882 4.38789 22.9522 10.1242 23.8524V15.4676H7.07758V11.9991H10.1242V9.35553C10.1242 6.34826 11.9156 4.68714 14.6564 4.68714C15.9692 4.68714 17.3424 4.92149 17.3424 4.92149V7.87439H15.8294C14.3388 7.87439 13.8739 8.79933 13.8739 9.74824V11.9991H17.2018L16.6698 15.4676H13.8739V23.8524C19.6103 22.9522 23.9981 17.9882 23.9981 11.9991Z"></path></svg>
                        </div>
                    </div>
                </div>
                <div class="recruiter">
                    <div class="upper-login-name">
                        <div class="both-name">
                            <h3>Login Recruiter</h3>
                            <h5>(Please login to continue)</h5>
                        </div>
                        <button class="continue"  ><a href="\harendra\createrecruiter.php">Create Recruiter Account</a>  </button>
                    </div>
                    <div class="input-box">
                        <input autocomplete="off" name="recemail" class="inp" type="text" placeholder="Enter gmail">
                        <input autocomplete="off" name="recpassword" class="inp" type="password" placeholder="Password">
                    </div>
                    <div class="alive">
                        <div class="alive-below">
                            <input type="checkbox" name="keep-me-login" id="">
                            <p style="margin-left:4px">Keep Me Logged In</p>
                        </div>
                        <a href="https:\\youtube.com">Forgot Password?</a>
                        
                    </div>
                    <div class="btn-section">
                        <?php
                            if($stuornot==0){
                                if($foundr==0){
                                    echo "<h5 style='margin-bottom:10px;font-weight:500; color:red; scale:1.5;' >[ Invalid email or password] </h5>";
                                    $stuornot=3;
                                }
                            }
                        ?>
                        <button name="rbtn" class="btn-login" >LOGIN</button>
                        <p>Or</p>
                        <p>Login with</p>
                        <div class="social-media">
                            <svg class="cp" stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px" y="0px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12
                                c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24
                                c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path><path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657
                                C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path><path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36
                                c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path><path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571
                                c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path></svg>
                                <svg class="cp" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm215.3 337.7c.3 4.7.3 9.6.3 14.4 0 146.8-111.8 315.9-316.1 315.9-63 0-121.4-18.3-170.6-49.8 9 1 17.6 1.4 26.8 1.4 52 0 99.8-17.6 137.9-47.4-48.8-1-89.8-33-103.8-77 17.1 2.5 32.5 2.5 50.1-2a111 111 0 0 1-88.9-109v-1.4c14.7 8.3 32 13.4 50.1 14.1a111.13 111.13 0 0 1-49.5-92.4c0-20.7 5.4-39.6 15.1-56a315.28 315.28 0 0 0 229 116.1C492 353.1 548.4 292 616.2 292c32 0 60.8 13.4 81.1 35 25.1-4.7 49.1-14.1 70.5-26.7-8.3 25.7-25.7 47.4-48.8 61.1 22.4-2.4 44-8.6 64-17.3-15.1 22.2-34 41.9-55.7 57.6z"></path></svg>
                                <svg class="cp" stroke="currentColor" fill="currentColor" stroke-width="0" role="img" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><title></title><path d="M23.9981 11.9991C23.9981 5.37216 18.626 0 11.9991 0C5.37216 0 0 5.37216 0 11.9991C0 17.9882 4.38789 22.9522 10.1242 23.8524V15.4676H7.07758V11.9991H10.1242V9.35553C10.1242 6.34826 11.9156 4.68714 14.6564 4.68714C15.9692 4.68714 17.3424 4.92149 17.3424 4.92149V7.87439H15.8294C14.3388 7.87439 13.8739 8.79933 13.8739 9.74824V11.9991H17.2018L16.6698 15.4676H13.8739V23.8524C19.6103 22.9522 23.9981 17.9882 23.9981 11.9991Z"></path></svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>