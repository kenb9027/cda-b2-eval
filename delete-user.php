<?php
/**
 * Created by iKNSA.
 * User: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 11/03/2022
 * Time: 10:53
 */

require_once 'includes.php';

if (strtolower($_SERVER['REQUEST_METHOD']) !== 'post') {
    echo '<h3>La méthode n\'est pas autorisé</h3>';
    die;
}

$query = $connection->prepare(
    'DELETE FROM `user` WHERE `id`=:id'
);

$query->bindValue('id', $_GET['id']);

if (!$query->execute()) {
    echo "La suppression ne s'est pas bien passé";
    die;
}

header('Location: /');
exit;
