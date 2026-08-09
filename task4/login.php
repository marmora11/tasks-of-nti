<?php
session_start();
include 'db.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $userPass = $_POST['password'];
    $query = "SELECT * FROM users WHERE email='$email'";
    
    $result = mysqli_query($conn, $query);
    
    $user = mysqli_fetch_assoc($result);
    
    if ($user && $userPass == $user['password']) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['firstName'] = $user['first_name'];
        
        echo "Login successful! Welcome, " . htmlspecialchars($user['first_name']);
        header('Location: home.php');
        exit();
     } 
    else {
         echo "Invalid email or password.";
        }
            
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
              rel="stylesheet">
        
    </head>

<body style="background-color: #864ef7c1;">

<form action="" method="POST">

    <div class="container" style="width: 400px; margin-top: 100px;">

        <div class="card shadow p-4 mx-auto" style="width: 400px; height: 450px; background-color: #c8c8f1;">

            <h2>Login</h2>

            <hr class="mb-4">
            
            <!-- Email Field -->
            <div class="row mb-3">

                <label class="col-6" for="email"> Email: </label>
                <input class="col-6" type="email" name="email" placeholder="Email" required>

            </div>


            <!-- Password Field -->
            <div class="row mb-3">

                <label class="col-6" for="password"> Password: </label>
                <input class="col-6" type="password" name="password" placeholder="Password" required>

            </div>


            <div class="d-flex justify-content-center mb-2">

                <button type="submit" class="btn btn-primary mt-3 width-100"> Login </button>

            </div>

            <div class="row text-center mt-3">
                <p>if you don't have an account, please
                    <a href="registeration.php"> Register here </a>
                </p>
            </div>

        </div>

    </div>

</form>

</body>
</html>
