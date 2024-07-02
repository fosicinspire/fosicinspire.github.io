<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connect.php';
    $username = $_POST["contact"];
    $password = $_POST["password"];

    $sql = "Select * from cus_address where contact ='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        $login = true;
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("location: orderspage.php");
    }
    else {
        $showError = "invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }
        body {
            height: 100vh;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif
        }
        .divdiv {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .div{
            height: 80%;
            width: 40%;
            padding: 2rem;
            box-shadow: 0px 0px 10px 5px black;
        }
        .div2 {
            margin-top: 3.5rem;
        }
        input {
            width: 100%;
            height: 2rem;
        }
        label {
            font-weight: 600;
        }
        #login {
            height: 3rem;
            background-color: rgb(63, 133, 143);
            border: none;
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-weight: 700;
            font-size: 1rem;
            margin-top: 3rem;
        }
    </style>
</head>
<body>
    <?php
    if($login){
        echo '<div class="alert alert-primary" role="alert">
  Login sucessfully :)
</div>';
    } if($showError) {
        echo '<div class="alert alert-danger" role="alert">
  Invalid username or password !!
</div>';
    }
    ?>
    <div class="divdiv">
      <div class="div">
        <h1>Login Now to view order Details</h1>
        <form action="loginpage.php" method="post">
            <div class="div2">
                <label for="mobile">enter mobile no. :</label>
            <input type="text" name="contact" id="mobile" required>
            </div>
            <div class="div2">
                <label for="pass">enter password :</label>
                <input type="password" name="password" id="pass" required>
            </div>
                <input type="submit" value="Login" name="login" id="login">
        </form>
      </div>
    </div>
</body>
</html>