<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$items = [
    1 => ['name' => 'headphone', 'price' => 100],
    2 => ['name' => 'smartwatch', 'price' => 150],
];
$cart = $_SESSION['cart'] ?? [];
?>
<h2>Your Cart</h2>
<?php if (empty($cart)): ?>
    <p>Cart is empty</p>
<?php else: ?>
    <table border="1">
        <tr><th>Item</th><th>Qty</th><th>Price</th></tr>
        <?php $total = 0;
        foreach ($cart as $id => $qty):
            $price = $items[$id]['price'] * $qty;
            $total += $price;
        ?>
        <tr>
            <td><?php echo $items[$id]['name']; ?></td>
            <td><?php echo $qty; ?></td>
            <td><?php echo $price; ?></td>
        </tr>
        <?php endforeach; ?>
        <tr><td colspan="2"><strong>Total</strong></td><td><?php echo $total; ?></td></tr>
    </table>
    <a href="checkout.php">Checkout</a>
<?php endif; ?>
<a href="home.php">Back to Items</a>
