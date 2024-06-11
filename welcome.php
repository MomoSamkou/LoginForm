<?php
session_start();

if(!isset($_SESSION['valid']) || $_SESSION['valid'] !== true) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "andel3A2";
$password = "123";
$dbname = "andelm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sort_by = "id"; 
$order = "ASC"; 

if(isset($_GET['sort_by'])) {
    $sort_by = $_GET['sort_by'];
    $order = $_GET['order'];
}

$sql = "SELECT products.id, products.name, products.price, products.quantity, categories.system as system
        FROM products
        LEFT JOIN categories ON products.system = categories.id
        ORDER BY $sort_by $order";
$result = $conn->query($sql);

$total_products = $result->num_rows;

$total_price = 0;
$total_quantity = 0;
if ($total_products > 0) {
    while($row = $result->fetch_assoc()) {
        $total_price += $row['price'];
        $total_quantity += $row['quantity'];
    }
    $average_price = $total_price / $total_products;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="welcome.css">
</head>
<body>
    <div class="wrapper">
        <div class="messages">
            <?php
            if (!empty($success_message)) {
                echo "<p class='success-message'>$success_message</p>";
            }
            if (!empty($error_message)) {
                echo "<p class='error-message'>$error_message</p>";
            }
            ?>
        </div>
        <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
        
        <div class="statistics">
            <p>Total Products: <?php echo $total_products; ?></p>
            <?php if ($total_products > 0): ?>
            <p>Average Price: <?php echo number_format($average_price, 2); ?></p>
            <p>Total Quantity: <?php echo $total_quantity; ?></p>
            <?php endif; ?>
        </div>
        
        <form method="GET" action="">
            <label for="sort_by">Sort By:</label>
            <select name="sort_by" id="sort_by">
                <option value="id">ID</option>
                <option value="name">Name</option>
                <option value="price">Price</option>
                <option value="quantity">Quantity</option>
            </select>
            <label for="order">Order:</label>
            <select name="order" id="order">
                <option value="ASC">Ascending</option>
                <option value="DESC">Descending</option>
            </select>
            <button type="submit">Sort</button>
        </form>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>System</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $result->data_seek(0); // Reset result pointer
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['price']."</td>";
                        echo "<td>".$row['quantity']."</td>";
                        echo "<td>".$row['system']."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="logout-link">
            <p><a href="logout.php">Logout</a></p>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
