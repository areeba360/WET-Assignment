<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$items = [
    1 => ['name' => 'headphone', 'price' => 100],
    2 => ['name' => 'smart watch', 'price' => 150],
];
$cart = $_SESSION['cart'] ?? [];
$total = 0;
foreach ($cart as $id => $qty) {
    $total += $items[$id]['price'] * $qty;
}
unset($_SESSION['cart']);
?>
<h2>Checkout Complete</h2>
<p>Total Paid: Rs. <?php echo $total; ?></p>
<p>Thank you!</p>
<a href="home.php">Back to Shop</a>