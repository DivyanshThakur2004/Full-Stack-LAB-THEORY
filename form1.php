<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Form Using POST method</title>
    </head>
    <body>
        <form action="/DIVYANSH/form1.php" method="POST">
            <label>Enter Email Address</label>
            <input type="text" name="email" placeholder="Enter Email here">
            <br><br>
            <label>Enter Password here</label>
            <input type="password" placeholder="Enter Password here" name="password">
            <br>
            <button type="submit">Submit</button>
        </form>
            <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $email = $_POST['email'];
                $password = $_POST['password'];
                echo "<h3>Th Username is $email and password is $password</h3>";
            }
            ?>
    </body>
</html>
