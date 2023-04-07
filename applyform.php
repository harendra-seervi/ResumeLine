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
    
    $mail=$_SESSION['smail'];
    
    // $idx=$_GET['id'];
    // var_dump($_GET);
    // echo "$mail";
    $check=false;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $firstname=$_POST['firstname'];
        $idxx=$_POST['idxx'];
        $lastname=$_POST['lastname'];
        $institute=$_POST['institute'];
        $cgpa=$_POST['cgpa'];
        $cfrating=$_POST['cfrating'];
        $ccrating=$_POST['ccrating'];
        $kickstart=$_POST['kickstart'];
        $description=$_POST['description'];
        $file=$_POST['fileupload'];
        $sql="select * from apply where email='$mail' and id='$idxx'";
        $res=mysqli_query($conn,$sql);
        $numofrow=mysqli_num_rows($res);
        if($numofrow>0){
            
            $check=true;
        }
        else{
            $sql="insert into apply values('$idxx','$firstname','$lastname','$institute','$cgpa','$cfrating','$ccrating','$kickstart','$description','$file','$mail')";
            $result=mysqli_query($conn,$sql);
            if(!$result){
                echo "sorry please try again";
            }
            header("location:\harendra\apply.php");
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js" defer></script>
    <!-- <script src="post.js" defer></script> -->
    <script src="apply.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.2.js"
        integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</head>

<body>
    <div class="nav-bar">
        <div class="logo" style="cursor:pointer;">
            <p class="brand-name">ResumeLine.com</p>
        </div>
        <div class="nav-btn">
            <button onclick="location.href='/harendra/homepage.php';" class="nav-button bw-cb backw">HOME</button>
            <button class="nav-button bw-cb backw">ABOUT</button>
            <button onclick="location.href='/harendra/apply.php';" class="nav-button bw-cb ">APPLY</button>
            <button onclick="location.href='/harendra/post.php';" class="nav-button bw-cb backw ">POST</button>
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

    <div class=" cont">
        <?php
            if($check==true){
                echo "<h3>You aleady applied for this job</h3>";
                exit;
            }
        ?>
        <h3>Fill your details </h3>
        <div >
            <form action="/harendra/applyform.php" method="POST">
                <label for="fname" >First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">

                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                <label for="lname">institute</label>
                <input type="text" id="lname" name="institute" placeholder="Enter institute name">

                <label for="lname">CGPA</label>
                <input type="text" id="lname" name="cgpa" placeholder="Average CGPA">

                <label for="lname">Codeforces rating</label>
                <input type="text" id="lname" name="cfrating" placeholder="Enter codeforces highest rating">

                <label for="lname">CodeChef rating</label>
                <input type="text" id="lname" name="ccrating" placeholder="Enter codechef highest rating">

                <label for="lname">Best Kickstart Rank</label>
                <input type="text" id="lname" name="kickstart" placeholder="Enter best rank of kickstart ">
                
                <label for="lname">Skillsets learned</label>
                <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <br>
                <label class="upr" for="lname">Upload your current resume</label>
                <br>
                <input type="file" name="fileupload">
                <input type="submit" value="Submit">
                <input type="hidden" name="idxx" value="<?php echo $_GET['id']?>">
            </form>
        </div>
    </div>
</body>