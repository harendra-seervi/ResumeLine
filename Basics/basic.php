<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>get/post </title>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            echo 'email hi' .$email;
            echo '<br>';
            echo 'pass' .$pass;
        }
        $servername="localhost";
        $username="root";
        $password="";
        $database="harendradb";
        $conn= mysqli_connect($servername,$username,$password,$database);
        if(!$conn){
            die("We fail to connect to the database" );
        }
        else{ 
            echo "Connection was successful <br>";   

            $sql ="USE harendradb";
            $result=mysqli_query($conn,$sql);
            if(!$result){
                echo "DB is already exist in this computer";
            }
            else{
                echo "DB create successfully";
                $sql="CREATE TABLE employe(id int,name varchar(50),age int)";
                $result=mysqli_query($conn,$sql);
                if($result==false){
                    $sql="insert into employe values(1,'harendra',22)";
                    $result=mysqli_query($conn,$sql);
                    echo"Not able to create";
                }
                else{
                    echo"Table is created";
                }
            }
        }
    ?>
    <div class="container">
        <form action = "/harendra/index.php" method="post">
            <input name="email" class="email type="text" placeholder="Enter e-mail">
            <input name="pass" class="password" type="text" placeholder="password">
            <button name="" class="btn" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>