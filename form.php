<?php
$msg = "";
$conn = new mysqli("localhost","root","","divyansh");
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $salary = $_POST['salary'];
if(empty($name) || empty($address) || empty($phone) || empty($email) || empty($salary)){
    $msg = "All fields must be filled, no fields can be left empty";
}
elseif(!preg_match("/^[a-zA-Z ]*$/",$name)){
    $msg = "Name must only contains alphabets";
}
elseif(!preg_match("/^[0-9]{10}$/",$phone)){
    $msg = "The Phone Number must contain only 10 Digits";
}
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $msg = "The Format of email is wrong";
}
elseif($salary <= 0){
    $msg="Salary field cannot be left at zero or Negative Number";
}
else{
    $sql = "INSERT INTO student(name,address,phone,email,salary) VALUES ('$name','$address','$phone','$email','$salary');";
if($conn->query($sql)){
    $msg = "Data Entry Inserted Successfully";
}
else{
    $msg = "Data Insertion Failed";
}
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Data Entry Form</title>
</head>
<body>
    <h3>Student Registration Form</h3>
    <form method = "POST">
        <label>Name:</label>
        <input type="text" name = "name" placeholder = "Enter Name here">
        <br><br>
        <label>Address</label>
        <input type="text" name="address" placeholder="Enter your Address here">
        <br><br>
        <label>Phone Number:</label>
        <input type ="text" name="phone" placeholder="Enter 10 Digit Phone Number here">
        <br><br>
        <label>Email:</label>
        <input type="text" name="email" placeholder="Enter your Email Address here">
        <br><br>
        <label>Salary</label>
        <input type="number" name="salary" placeholder="Enter your salary here">
        <br><br>
        <input type="submit" name="submit" value="submit">
    </form>
    <br><br>
    <h3><?php echo $msg; ?></h3>
</body>
</html>