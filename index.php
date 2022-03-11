<?php

require_once 'includes.php';

$sql = 'SELECT * FROM `user` ORDER BY `id` DESC LIMIT 5';

$users = $connection
    ->query($sql)
    ->fetchAll(PDO::FETCH_ASSOC);

$prodSql = 'SELECT * FROM `product` ORDER BY `id` DESC LIMIT 5';
$products = $connection->query($prodSql)->fetchAll(PDO::FETCH_ASSOC);

/**
 *
 * @todo:  Afficher les 5 derniers produits sur la Home (id , name , selling_price)
 * @todo: pouvoir cliquer sur un produit et envoi vers page de details du produit ( name , cost_price , selling_price, category)
 *
 */
?>

<?php
require_once 'template_head.php';
?>

<h3>Users</h3>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?= $user['id'] ?></td>
        <td><?= $user['name'] ?></td>
        <td><?= $user['email'] ?></td>
        <td>

            <a href="/edit-user.php?id=<?= $user['id'] ?>">Edit user</a>

            <form method="post" action="/delete-user.php?id=<?= $user['id'] ?>">
                <button>Delete</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<hr>

<h3>Last 5 Products</h3>

<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?= $product['id'] ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['selling_price'] ?></td>
            <td>
                <form method="post" action="/detail-product.php?id=<?= $product['id'] ?>">
                    <button>Details</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>



</body>
</html>