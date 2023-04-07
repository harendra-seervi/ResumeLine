<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $servername="localhost";
        $username="root";
        $password="";
        $database="harendradb";
        $conn= mysqli_connect($servername,$username,$password,$database);
        if($conn){
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $stnamee=$_POST['stname'];
                $stno=$_POST['stno'];
                $sql="select stname from student";
                $result=mysqli_query($conn,$sql);
                if($result){
                    $ct=mysqli_num_rows($result);
                    while($ct){
                        $ct=$ct -1;
                        $cmpname = mysqli_fetch_assoc($result);
                        if($cmpname['stname']==$stnamee){
                            echo "Student is lies in database";
                        }
                    }
                }
            }
        }
    ?>
    <form action="/harendra/index.php" method="post">
        <div class="container">
            <input type="text" name="stname" placeholder="Name">
            <input type="text" name="stno" placeholder="Phone no.">
            <button>Submit</button>
        </div>
    </form>
</body>
</html>