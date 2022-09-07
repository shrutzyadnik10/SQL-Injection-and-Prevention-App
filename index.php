<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "login_details";
$conn = mysqli_connect($hostname, $username, $password, $dbname);
if(!$conn) {
	die("Unable to connect");
}
if($_POST) {
	$uname = $_POST["username"];
	$pass = $_POST["password"];
	//Making sure that SQL Injection doesn't work
	$uname = mysqli_real_escape_string($conn, $uname);//test or 1=1
	$pass = mysqli_real_escape_string($conn, $pass);
	$sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$pass'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) == 1) {
		echo '<h1>Welcome, user!<h1>';
} else {
		echo '<h2>Incorrect Username/Password</h2>';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Portal</title>
</head>
<style>
	.container{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: -259px;
    height: 100%;
    width: 100%;
    position: relative;
    flex-direction: column;

}
.login-box{
    margin-top: 40vh;
    box-sizing: border-box;
    border: 2px solid black;
    padding: 60px;
    border-radius: 20px;
    box-shadow:2px 2px 4px black; 

}

.input{
    display: flex;
    border: 2px solid black;
    border-radius: 10px;
    margin: 10px;
    padding: 9px;
    background-color: transparent;
    

}
.btn{
    border-radius: 10px;
    margin: 10px ;
    height: 20%;
    width: 90%;
    background-color: black;
    color: white;
    text-align: center;
    justify-content: center;
    align-items: center;
    text-decoration: none;
    cursor: pointer;

}
h1{
    display: flex;
    justify-content: center;
    align-items: center;
}
h2{
    display: flex;
    justify-content: center;
    align-items: center;
}
	</style>
<body>
	<form action method="POST" autocomplete="off">
		<div class="container">
		<div class="login-box">
		<input type="text" class="input" name="username" placeholder="Username" autocomplete="off">
        <input type="password" class="input" name="password" placeholder="Password" autocomplete="off">
		<input type="submit" class="btn" name="login" value="LOGIN" />
		</div>
		</div>
	</form>
</body>
</html>