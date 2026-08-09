<?php

session_start();
include "db.php";

echo "Welcome to the home page!";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email='$email'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        $user = mysqli_fetch_assoc($result);

        echo "Hello, " . htmlspecialchars($user['first_name']) . "!";

    } else {

        echo "Hello, Guest!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body style="background-color: #864ef7c1;">

    <div class="container" style="width: 400px; margin-top: 100px;">

        <div class="card shadow p-4 mx-auto"
             style="width: 400px; height: 450px; background-color: #c8c8f1;">

            <h2>Home</h2>

            <hr class="mb-4">

            <p>Welcome to the home page!</p>

            <p>
                welcome, <?php echo isset($_SESSION['firstName']) ? htmlspecialchars($_SESSION['firstName']) : 'Guest'; ?>!
            </p>
            <p>
                You are logged in as:
                <?php
                echo isset($_SESSION['email'])
                    ? htmlspecialchars($_SESSION['email'])
                    : 'Guest';
                ?>
            </p>
            <form action="logout.php" method="POST">
                <button type="submit" class="btn btn-danger mt-3 width-100"> Logout
                     </button>

            </form>

        </div>

    </div>

</body>

</html>