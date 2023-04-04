<?php
$fastname = $_post['name'];
$lastname = $_post['lastname'];
$gender = $_post['gender'];
$age = $_post['age'];
$phonenumber = $_post['phonenumber'];
$email = $_post['email'];
$password = $_post['password'];
$cpassword = $_post['cpassword'];




//connect to database code

$conn = new mysqli('localhost:2122','root','','test');


if($conn->connect_error){
	echo "conn->connect_error";
	die("connection failed : ", $conn->connect_error);
}

else {
	$stmt= $conn->prepare("insert into 'register'('fastname','lastname','gender','age','phonenumber','email','password','cpassword') values(?,?,?,?,?,?,?,?)");
	$stmt->bind_param("ssssssss",$fastname,$lastname,$gender,$age,$phonenumber,$email,$password,$cpassword);
	$execval = $stmt->execute();
	echo $execval;
	echo "submitted your form........";
	$stmt->close();
	$conn->close();
}
?>
