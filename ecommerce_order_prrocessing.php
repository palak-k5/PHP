<?php

$users = [
    [
        "name" => "Alice",
        "orders" => [
            ["product" => "Shampoo", "price" => 800, "qty" => 1],
            ["product" => "Oil", "price" => 200, "qty" => 3],
        ]
    ],
    [
        "name" => "Palak",
        "orders" => [
            ["product" => "Shirt", "price" => 800, "qty" => 5],
            ["product" => "Trouser", "price" => 2600, "qty" => 3],
        ]
    ],
    [
        "name" => "Charlie",
        "orders" => []
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Loops</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 15px; }
        th, td { border: 1px solid #ccc; padding: 6px; }
        .user { margin-bottom: 20px; }
    </style>
</head>
<body>

<h2>User Orders</h2>

<?php

for ($i = 0; $i < count($users); $i++) {

    $user = $users[$i];
?>

<div class="user">
    <h3><?php echo $user['name']; ?></h3>

<?php
    
    if (empty($user['orders'])) {
        echo "<p>No orders found</p>";
    } else {

        echo "<table>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>";

        $total = 0;

        $j = 0;
        while ($j < count($user['orders'])) {

            $order = $user['orders'][$j];
            $subtotal = $order['price'] * $order['qty'];
            $total += $subtotal;
?>

        <tr>
            <td><?php echo $order['product']; ?></td>
            <td><?php echo $order['price']; ?></td>
            <td><?php echo $order['qty']; ?></td>
            <td><?php echo $subtotal; ?></td>
        </tr>

<?php
            $j++;
        }

        echo "</table>";
        $k = 0;
        do {
            echo "<small>Processed orders for {$user['name']}</small><br>";
            $k++;
        } while ($k < 1);

        echo "<strong>Total: ₹$total</strong>";
    }
?>
</div>
<?php
}

echo "<h3>Summary (Using foreach)</h3>";

foreach ($users as $u) {
    echo $u['name'] . "<br>";
}
?>

</body>
</html>