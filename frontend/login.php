<?php
session_start();
include("../connect_db.php");
include("../userModel.php");
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $user = new userModel();
    $user->set_connection($conn);
    $result = $user->login($email, $password);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $email;
    
        // header("location: index.php");
        if ($row['role'] == 'Admin') {
            header("location: ../backend/admin.php");
        } else {
            header("location: index.php");

        }
        
    } else {
        echo "<script>if(confirm('ไม่พบอีเมลนี้ในระบบ')){document.location.href='login.php'};</script>";
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
    <link rel="stylesheet" href="../mystyle.css">
</head>

<body>

    <form method="post">
        <div class="container">
            <h1>Login</h1>

            <hr>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-zA-Z]{2,4}" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" id="password" autofocus required maxlength="50" minlength="6">



            <hr>

            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
            <button type="submit" name="submit" class="registerbtn">Login</button>
        </div>

        <div class="container signin">
            <p>If you don't have an account yet <a href="register.php">Sign up</a>.</p>
        </div>
    </form>
</body>

</html>