<?php
include 'db.php';

$sql = "SELECT * FROM destinations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tourism Management System</title>
</head>
<body>
    <h1>Available Destinations</h1>
    <ul>
        <?php while($row = $result->fetch_assoc()): ?>
            <li>
                <h2><?php echo $row['name']; ?></h2>
                <p><?php echo $row['description']; ?></p>
                <p>Price: $<?php echo $row['price']; ?></p>
                <a href="book.php?destination_id=<?php echo $row['id']; ?>">Book Now</a>
            </li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
