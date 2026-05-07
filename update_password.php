<?php
$msg1 = "";
$msg2 = "";
$conn = new mysqli("localhost","root","","divyansh");
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $sql = "SELECT * FROM bank WHERE username = '$username'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $rows = $result->fetch_assoc();
        $hash = $rows['password'];
        if(password_verify($old_password,$hash)){
            $msg1 = "Login Successfull!";
            $new_hash = password_hash($new_password,PASSWORD_DEFAULT);
            $sql = "UPDATE bank SET password = '$new_hash' WHERE username = '$username'";
            if($conn->query($sql)){
                $msg2 = "The Password has been updated succesfully!";
            }
            else{
                $msg2 = "The Password updation Failed!";
            }
        }
        else{
            $msg1 = "Login Failed! please try again.";
        }
    }
    else{
        $msg1 = "No such Entry Found in the Database. Please try again";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Password Change Form</title>
    </head>
    <body>
        <h3>Password Change request form</h3>
        <form method="POST">
            <label>Username:</label>
            <input type="text" name="username" placeholder="Please Enter Username here" required>
            <br><br>
            <label>Old Password</label>
            <input type="password" name="old_password", placeholder="Please Enter current password here" required>
            <br><br>
            <label>New Password</label>
            <input type="password" name="new_password" placeholder="Please enter new requested password here" required>
            <br>
            <input type="submit" name="submit" value="submit">
        </form>
        <h3><?php echo $msg1; echo "<br>"; echo $msg2; ?></h3>
    </body>
</html>
