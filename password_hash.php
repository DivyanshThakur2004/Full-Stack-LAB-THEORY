<?php
$conn = new mysqli("localhost","root","","divyansh");
$msg = "";
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $sql = "INSERT INTO bank(username, password) VALUES ('$name','$hash')";
    if($conn->query($sql)){
        $msg = "Registration Successfull!";
    }

    else{
        $msg = "Login Failed! Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BanK Registration form</title>
    </head>
    <body>
        <h3>Bank Registration form</h3>
        <br><br>
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="name" placeholder="Enter Name here" required>
            <br><br>
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter Password here" required>
            <br>
            <input type="submit" name="submit" value="submit">
        </form>
        <h3><?php echo $msg; ?></h3>
    </body>
</html>