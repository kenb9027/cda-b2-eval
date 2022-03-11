<?php
require_once 'includes.php';

if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
    echo '<h3>Method non autorisée</h3>';
}

if ( isset($_GET['id']) && !empty( $_GET['id'] ) ) {
    $id = $_GET['id'];
}

$sql = 'SELECT * FROM `product` WHERE id=' . $id;

$product = $connection->query($sql)->fetch(PDO::FETCH_ASSOC);

require_once 'template_head.php';

?>


            <p><?= $product['id'] ?></p>
            <h3><?= $product['name'] ?></h3>
            <p>Selling Price: <?= $product['selling_price'] ?></p>
            <p>Cost Price: <?= $product['cost_price'] ?></p>
            <p>Cat.:<?= $product['category'] ?></p>



