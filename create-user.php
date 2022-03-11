<?php

require_once 'includes.php';

if (mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    $newUser = $connection->prepare(
        "INSERT INTO `user` (full_name, first_name, name, gender, email, phone)
                VALUE (:full_name, :first_name, :name, :gender, :email, :phone)"
    );

    $newUser->bindValue('full_name', $_POST['first_name'] . ' ' . $_POST['name']);
    $newUser->bindValue('first_name', $_POST['first_name']);
    $newUser->bindValue('name', $_POST['name']);
    $newUser->bindValue('gender', $_POST['gender']);
    $newUser->bindValue('email', $_POST['email']);
    $newUser->bindValue('phone', $_POST['phone']);

    $newUser->execute();

    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}
?>

<?php
require_once 'template_head.php';
?>

<?php
require_once 'user-form.php';
?>

</body>
</html>