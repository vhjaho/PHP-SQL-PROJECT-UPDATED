<?php

if (isset($_POST['checkAnswers'])) {

    $_SESSION['firstE'] = $_POST['firstE'];
        $_SESSION['secondE'] = $_POST['secondE'];
        $_SESSION['thirdE'] = $_POST['thirdE'];
        $_SESSION['answersE'] = array($_SESSION['firstE'], $_SESSION['secondE'], $_SESSION['thirdE']);
    
        //validation
    
        for ($i = 0; $i < sizeof($_SESSION['answersE']); $i++) {
            //for-loop checks if answers were numbers or not
            if (filter_var($_SESSION['answersE'][$i], FILTER_VALIDATE_INT) == false) {
                echo "Alert: " . $_SESSION['answersE'][$i] . " is not a number - ";
                }
            }
    
        if ($_SESSION['firstE'] == '-10') {
            $_SESSION['points']++;
        } if ($_SESSION['secondE'] == '971') {
            $_SESSION['points']++;
        } if ($_SESSION['thirdE'] == '8') {
            $_SESSION['points']++;
        }

    }

?>