<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'validate.inc';
    validateName($errors, $_POST, 'surname');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');

    if ($errors) {
        echo '<h3>Fix the following errors:</h3>';
        foreach ($errors as $field => $error)
            echo "$field : $error<br/>";
        include 'form.inc';
    } else {
        echo '<h3>Data valid!</h3>';
        include 'form.inc';
    }
} else {
    include 'form.inc';
}
?>
