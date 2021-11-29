<?php

session_start();

?>

<!DOCTYPE html>

<?php

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago

	header('Location: submit.php');
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

require_once("login.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	//session variables for the answers
	$_SESSION['first'] = $_POST['first'];
	$_SESSION['second'] = $_POST['second'];
	$_SESSION['third'] = $_POST['third'];
	$_SESSION['fourth'] = $_POST['fourth'];
	$_SESSION['fifth'] = $_POST['fifth'];
	$_SESSION['answers'] = array($_SESSION['first'], $_SESSION['second'], $_SESSION['third'], $_SESSION['fourth'], $_SESSION['fifth']);

		//checkint-button pressed
		if (isset($_POST['checkAnswers'])) {
			$_SESSION['points'] = 0;
			//validation and point calc
			for ($i = 0; $i < sizeof($_SESSION['answers']); $i++) {
				//for-loop checks if answers were numbers or not
				if (filter_var($_SESSION['answers'][$i], FILTER_VALIDATE_INT) == false) {
					echo "Alert: " . $_SESSION['answers'][$i] . " is not a number - ";
					}
				}

				if ($_SESSION['first'] == '87') {
					$_SESSION['points']++;
				} if ($_SESSION['second'] == '-66') {
					$_SESSION['points']++;
				} if ($_SESSION['third'] == '-3') {
					$_SESSION['points']++;
				} if ($_SESSION['fourth'] == '-80') {
					$_SESSION['points']++;
				} if ($_SESSION['fifth'] == '125') {
					$_SESSION['points']++;
				}

			}

			require_once("units.php");

			require_once("pct.php");

			require_once("exp.php");

			if (isset($_POST['finish'])) {

			//tee error handling
			$stmt = $conn->prepare("INSERT INTO students (FNAME, LNAME, POINTS) VALUES (?, ?, ?)");
			$stmt->bind_param("sss", $_SESSION['fname'] , $_SESSION['lname'], $_SESSION['points']);
			$stmt->execute();
		
			header('Location: submit.php');
		
			$conn->close();

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
	<link rel="stylesheet" href="phpsql.css">
</head>
<body>
	<div class="container" id="divExam">
	<h1>Math Test - Time Limit 30 minutes</h1>
	<br>
	<br>
	<h1>Basic Calculations</h1>
	<br>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<strong>1. 98 - 56 + 45 = </strong><br><input type="text" name="first" required><br> 
    	<strong>2. 376 - 678 + 236 = </strong><br><input type="text" name="second" required><br>
    	<strong>3. 6 X 7-9 X 5 = </strong><br><input type="text" name="third" required><br>
		<strong>4. 56 X 5 + 23 X 9 - 567 = </strong><br><input type="text" name="fourth" required><br>
		<strong>5. 120 + 10 / 2 = </strong><br><input type="text" name="fifth" required><br><br>
		<h1>Units</h1><br>
		<strong>6. Change to milligrams - 925 micrograms = </strong><br><input type="text" name="firstU" required><br> 
        <strong>7. Change to grams - 7260 mg = </strong><br><input type="text" name="secondU" required><br>
        <strong>8. Change to milliliters - 4.5 L = </strong><br><input type="text" name="thirdU" required><br>
		<strong>9. Change to Liters - 725 ml  = </strong><br><input type="text" name="fourthU" required><br>
		<strong>10. Change to micrometer - 22.45 mm = </strong><br><input type="text" name="fifthU" required><br><br>
		<h1>Percentage 10 Points</h1><br>
		<strong>11. 10 % of 2500 = </strong><input type="text" name="firstP" required><br> 
        <strong>12. 30 % of 4700 = </strong><input type="text" name="secondP" required><br>
        <strong>13. 50 % of 7500 = </strong><input type="text" name="thirdP" required><br>
		<strong>14. 80 % of 9200 = </strong><input type="text" name="fourthP" required><br>
		<strong>15. 42 % of 4800 = </strong><input type="text" name="fifthP" required><br><br>
		<h1>Expressions</h1><br>
		<strong>16. X + 45 = 35 What is X? = </strong><input type="text" name="firstE" required><br>
		<strong>17. 2. X - 526 = 445 What is X? = </strong><input type="text" name="secondE" required><br>
		<strong>18. If X = 5 then 2X+3-X = </strong><input type="text" name="thirdE" required><br><br>
        <input type="submit" name="checkAnswers" value="Submit">

	</form>
	
	<br><br>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<input type="submit" name="finish" value="End the test">
	</form>
	<br>
	</div>

</body>
</html>

