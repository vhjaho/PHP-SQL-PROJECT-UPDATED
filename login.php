<!DOCTYPE html>

<?php

$servername = "127.0.0.1:49838";
$username = "azure";
$password = "6#vWHD_$";
$dbname = "phpsqltest";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if ($_SERVER['REQUEST_METHOD'] == 'POST')

	{
		//checkint-button pressed
		if (isset($_POST['login'])) {
		
			if (strlen($_POST['fname'])>10) {
				echo 'First name is too long.';

			} else if (strlen($_POST['lname'])>10) {
				echo 'Last name is too long.';

			} else if (strlen($_POST['fname'])<3) {
				echo 'Last name is too short.';

			} else if (strlen($_POST['lname'])<3) {
				echo 'Last name is too short.';

			} else if (filter_var($_POST['fname'], FILTER_VALIDATE_INT) == true) {
				echo 'Numbers are not allowed';

			} else if (filter_var($_POST['lname'], FILTER_VALIDATE_INT) == true) {
				echo 'Numbers are not allowed';

			} else {

				$_SESSION['fname'] = $_POST['fname'];
				$_SESSION['lname'] = $_POST['lname'];
				echo"Welcome, " . $_SESSION['fname'] . " " . $_SESSION['lname'];

			}
			
		}

	}

?>

<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<meta charset="utf-8">
    <title>Math Exam</title>
</head>
<body>
	<div class="container" id=divLog>
	<br>
	<br>
	<h1>Insert your first and last name</h1>
	<br>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		Give your first name: <input type="text" name="fname" required><br> 
        Give your last name: <input type="text" name="lname" required><br>
        <label for="slc">Are you a student or a teacher?</label>
        <select name="slc" id="slc">
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select>
        <input type="submit" name="login" value="Login">

	</form>
	</div>
</body>
</html>