<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$items = [
    1 => ['name' => 'headphone', 'price' => 100, 'image' => 'images\headphone.jpg"],
    2 => ['name' => 'smart watch', 'price' => 150, 'image' => 'images\smart watch.jpg'],
];
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 1;
    } else {
        $_SESSION['cart'][$id]++;
    }
    header("Location: home.php");
}
?>
<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
<h3>Students:</h3>
<?php foreach ($items as $id => $item): ?>
    <div style="border:1px solid #ccc; padding:10px; width:200px; margin-bottom:10px;">
        <img src="<?php echo $item['image']; ?>" width="100"><br>
        <?php echo $item['name']; ?><br>
        Price: Rs. <?php echo $item['price']; ?><br>
        <a href="?add=<?php echo $id; ?>">Add to Cart</a>
    </div>
<?php endforeach; ?>
<a href="cart.php">Go to Cart</a>