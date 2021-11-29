<?php

if (isset($_POST['checkAnswers'])) {

    $_SESSION['firstU'] = $_POST['firstU'];
	$_SESSION['secondU'] = $_POST['secondU'];
	$_SESSION['thirdU'] = $_POST['thirdU'];
	$_SESSION['fourthU'] = $_POST['fourthU'];
	$_SESSION['fifthU'] = $_POST['fifthU'];
	$_SESSION['answersU'] = array($_SESSION['firstU'], $_SESSION['secondU'], $_SESSION['thirdU'], $_SESSION['fourthU'], $_SESSION['fifthU']);

    //validation

    for ($i = 0; $i < sizeof($_SESSION['answersU']); $i++) {
        //check the length of answers
        if (strlen($_SESSION['answersU'][$i]) > 20) {
            echo "Input is too long.";
        }
    }

    if ($_SESSION['firstU'] == '0.925 mg') {
        $_SESSION['points']++;
    } if ($_SESSION['secondU'] == '7.26 g') {
        $_SESSION['points']++;
    } if ($_SESSION['thirdU'] == '4500 ml') {
        $_SESSION['points']++;
    } if ($_SESSION['fourthU'] == '0.725 L') {
        $_SESSION['points']++;
    } if ($_SESSION['fifthU'] == '22450 micrometer') {
        $_SESSION['points']++;
    }

}

?>