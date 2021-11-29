<?php

if (isset($_POST['checkAnswers'])) {

$_SESSION['firstP'] = $_POST['firstP'];
	$_SESSION['secondP'] = $_POST['secondP'];
	$_SESSION['thirdP'] = $_POST['thirdP'];
	$_SESSION['fourthP'] = $_POST['fourthP'];
	$_SESSION['fifthP'] = $_POST['fifthP'];
	$_SESSION['answersP'] = array($_SESSION['firstP'], $_SESSION['secondP'], $_SESSION['thirdP'], $_SESSION['fourthP'], $_SESSION['fifthP']);

    //validation

    for ($i = 0; $i < sizeof($_SESSION['answersP']); $i++) {
        //for-loop checks if answers were numbers or not
        if (filter_var($_SESSION['answersP'][$i], FILTER_VALIDATE_INT) == false) {
            echo "Alert: " . $_SESSION['answersP'][$i] . " is not a number - ";
            }
        }

    if ($_SESSION['firstP'] == '250') {
        $_SESSION['points']++;
    } if ($_SESSION['secondP'] == '1410') {
        $_SESSION['points']++;
    } if ($_SESSION['thirdP'] == '3750') {
        $_SESSION['points']++;
    } if ($_SESSION['fourthP'] == '7360') {
        $_SESSION['points']++;
    } if ($_SESSION['fifthP'] == '2016') {
        $_SESSION['points']++;
    }

}

?>