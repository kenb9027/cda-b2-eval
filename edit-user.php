<?php
/**
 * Created by iKNSA.
 * User: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 11/03/2022
 * Time: 12:05
 */

require_once 'includes.php';

$user = $connection
    ->query('SELECT * FROM user WHERE id=' . $_GET['id'])
    ->fetch(PDO::FETCH_ASSOC);

if (strtolower($_SERVER['REQUEST_METHOD']) === 'post') {

    $updateUserQuery = $connection->prepare(
        "UPDATE `user` SET
                full_name=:full_name, first_name=:first_name, name=:name,
                  gender=:gender, email=:email, phone=:phone WHERE id=:id"
    );

    $updateUserQuery->bindValue('full_name', $_POST['first_name'] . ' ' . $_POST['name']);
    $updateUserQuery->bindValue('first_name', $_POST['first_name']);
    $updateUserQuery->bindValue('name', $_POST['name']);
    $updateUserQuery->bindValue('gender', $_POST['gender']);
    $updateUserQuery->bindValue('email', $_POST['email']);
    $updateUserQuery->bindValue('phone', $_POST['phone']);
    $updateUserQuery->bindValue('id', $_GET['id']);

    $updateUserQuery->execute();

    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit;
}

?>


<?php
require_once 'template_head.php';
require_once 'user-form.php';