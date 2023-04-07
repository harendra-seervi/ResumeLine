<?php 
    $servername="localhost";
    $username="root";
    $password="";
    $database="harendradb";
    $conn=mysqli_connect($servername,$username,$password,$database);
    if($conn){
        echo "Connected"; 
    }
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $tittle = $_POST['tittle'];
        $discription = $_POST['discription'];
        $sql = "insert into notes values('$tittle','$discription')";
        $result = mysqli_query($conn,$sql);
        echo "$discription"; 
        if($result){
            echo "Data inserted successfully";
        }else{
            echo "Not inserted ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PHP CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <form action="/harendra/todo.php" method="post" >
            <h2>Add Note</h2>
            <div class="form-group my-4">
                <label for="exampleInputEmail1">Note tittle</label>
                <input name="tittle" type="text" class="form-control" id="tittle" aria-describedby="emailHelp"
                    placeholder="Write note tittle">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Note Discription</label>
                <input name="discription" type="text" class="form-control my-1" id="discription"
                    placeholder="Write notes">
            </div>

            <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>
        <form action="/harendra/todo.php" method="post" >
            <h2>Add Note</h2>
            <div class="form-group my-4">
                <label for="exampleInputEmail1">Note tittle</label>
                <input name="tittle" type="text" class="form-control" id="tittle" aria-describedby="emailHelp"
                    placeholder="Write note tittle">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Note Discription</label>
                <input name="discription" type="text" class="form-control my-1" id="discription"
                    placeholder="Write notes">
            </div>

            <button type="submit" class="btn btn-primary my-3">Submit</button>
        </form>
    </div>
    <div class="container">
        <?php
            $sql="select *from notes";
            $result=mysqli_query($conn,$sql);
            $ct=mysqli_num_rows($result);
            while($ct){
                $ct=$ct-1;
                $row=mysqli_fetch_assoc($result);
                echo $row['tittle'] ; 
                echo $row['discription'];
            }
        ?>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Sno.</th>
            <th scope="col">Note Tittle</th>
            <th scope="col">Note Discription</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql="select *from notes";
                $result=mysqli_query($conn,$sql);
                if($result){
                    $ct=mysqli_num_rows($result);

                    while($ct){
                        $row=mysqli_fetch_assoc($result);
                        $tname=$row['tittle'];
                        $tdis=$row['discription'];
                        echo "<tr>
                        <th scope='row'>$ct</th>
                        <td>$tname</td>
                        <td>$tdis</td>
                        </tr>";
                        $ct=$ct-1;
                    }
                }
                ?>
        </tbody>
    </table>

    </div>
</body>

</html>