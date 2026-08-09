<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users 
            (first_name, last_name, email, password) 
            VALUES 
            ('$firstname', '$lastname', '$email', '$password')";
    // Check if email already exists
    $check = "SELECT id FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        echo "Email already exists.";
    } else if (mysqli_query($conn, $sql)) {
        echo "User created successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>

<body style="background-color: #864ef7c1;">

<form action="" method="POST">

    <div class="container" style="width: 400px; margin-top: 100px;">

        <div class="card shadow p-4 mx-auto" style="width: 400px; height: 450px; background-color: #c8c8f1;">

            <h2>Registration</h2>

            <hr class="mb-4">
            <!-- Form fields for first name, last name, email, and password -->
             <!-- First Name Field -->
            <div class="row mb-3">

                <label class="col-6" for="first_name"> First Name: </label>
                <input class="col-6" type="text" name="first_name" placeholder="First Name" required>
                

            </div>

            <!-- Last Name Field -->
            <div class="row mb-3">

                <label class="col-6" for="last_name"> Last Name: </label>
                <input class="col-6" type="text" name="last_name" placeholder="Last Name" required>

            </div>
            
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


            <hr class="mb-4">

            <div class="d-flex justify-content-center mb-2">

                <button type="submit" class="btn btn-primary"> Sign up </button>

            </div>


            <div class="text-center"> Already have an account?
                 <a href="login.php"> Login here </a> 
            </div>

        </div>

    </div>

</form>

</body>
</html>