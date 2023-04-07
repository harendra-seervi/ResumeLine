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
    if(isset($_SESSION['login'])){
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
            <button onclick="location.href='/harendra/apply.php';" class="nav-button bw-cb backw ">APPLY</button>
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
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">G-mail</th>
                    <th scope="col">Skills</th>
                    <th scope="col">Institute</th>
                    <th scope="col">CGPA</th>
                    <th scope="col">Codeforces</th>
                    <th scope="col">Codechef</th>
                    <th scope="col">Kickstart</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // echo $mail; 
                    $id=$_GET['id'];
                    $sql="select *from apply where id=$id";
                    $result=mysqli_query($conn,$sql);
                    // echo var_dump(mysqli_fetch_assoc($result));
                    $roww=mysqli_num_rows($result);
                    $temp=$roww;
                    while($roww>0){
                      $ele=mysqli_fetch_assoc($result);
                      $id=$ele['firstname'];
                      $role=$ele['lastname'];
                      $skill=$ele['skills'];
                      $institute=$ele['institute'];
                      $cf=$ele['cf'];
                      $cc=$ele['cc'];
                      $ks=$ele['ks'];
                      $cgpa=$ele['cgpa'];
                      // $role=$ele['role'];
                      $maill=$ele['email'];
                      $newtemp=$temp-$roww+1;
                      echo "<tr><th scope='row'>$newtemp</th>
                      <td>$id $role</td>
                      <td>$maill</td>
                      <td>$skill</td>
                      <td>$institute</td>
                      <td>$cgpa</td>
                      <td>$cf</td>
                      <td>$cc</td>
                      <td>$ks</td>
                      <td><button  class='rrr bw-cb backw post-new invite'>Invite</button></td>
                      </tr>";
                      $roww=$roww-1;
                    }
                  ?>
            </tbody>
        </table>

    </div>
</body>