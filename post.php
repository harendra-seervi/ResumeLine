<?php
  $servername="localhost";
  $username="root";
  $password="";
  $database="resumeline";
  $ck=false;
  $conn=mysqli_connect($servername,$username,$password,$database);
  session_start();
  if(!$conn){
      echo "Not able to connect database";
      exit();
  }
    if($_SESSION['login']==false){
        header("location:\harendra\login.php");
    }
    if(isset($_SESSION['login'])){
        //here we can dispaly the username of the person    
        // echo $_SESSION['firstname'];
    }
    if($_SESSION['isstudent']==false){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            // echo "$id";
            if($id>0){
                $sql="delete from post where jobid='$id'";
                $res=mysqli_query($conn,$sql);
                $sql="delete from apply where id='$id'";
                $res=mysqli_query($conn,$sql);
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

        </div>
    </div>

    <?php
        if($_SESSION['isstudent']==true){
            echo "<div class='massage'>
                <h4>You have student account</h4>
                <h4>You are not allow to post job</h4>
            </div>";
            exit();
        }
    ?>
    <div class="container">
        <div class="create-sec">
            <button onclick="location.href='/harendra/jobinput.php';" class="rrr bw-cb backw post-new">Post New </button>
        </div>
        <div class="job-frame">
            <table class="table">
                
                <thead>
                  <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Job ID</th>
                    <th scope="col">ROLE</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $mail=$_SESSION['recmail'];
                    // echo $mail;
                    $sql="select *from post where recmail='$mail'";
                    $result=mysqli_query($conn,$sql);
                    // echo var_dump(mysqli_fetch_assoc($result));
                    $roww=mysqli_num_rows($result);
                    $temp=$roww;
                    while($roww>0){
                      $ele=mysqli_fetch_assoc($result);
                      $id=$ele['jobid'];
                      $role=$ele['role'];
                      // $role=$ele['role'];
                      $newtemp=$temp-$roww+1;
                      echo "<tr><th scope='row'>$newtemp</th>
                      <td>$id</td>
                      <td>$role</td>
                      <td><button class='rrr bw-cb backw dekho' >View</button><button type='submit' class='rrr bw-cb backw redc remo'>Remove</button></td>
                      </tr>";
                      $roww=$roww-1;
                    }
                  
                  ?>
                </tbody>
              </table>
        </div>
    </div>
</body>