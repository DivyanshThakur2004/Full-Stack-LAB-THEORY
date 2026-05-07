<?php
$msg = "";
$conn = new mysqli("localhost","root","","divyansh");
if(isset($_POST['submit'])){
    $name = $_POST['username'];
    $given_password = $_POST['password'];
    $sql = "SELECT * FROM bank WHERE username = '$name'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();
        $hash = $rows['password'];
        if(password_verify($given_password,$hash)){
            $msg = "Login Successfull!";
        }
        else{
            $msg = "Login Failed! Please try again.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login form</title>
    </head>
    <body>
        <h3>Login Registration form</h3>
        <br>
        <form method="POST">
            <label>Username:</label>
            <input type="text" placeholder="Enter Username here" name="username" required>
            <br><br>
            <label>Password:</label>
            <input type="password" name="password" placeholder="Enter Your Password here" required>
            <br><br>
            <input type="submit" name="submit" value="submit">
        </form>
        <br>
        <h3><?php echo $msg; ?></h3>
    </body>
</html>