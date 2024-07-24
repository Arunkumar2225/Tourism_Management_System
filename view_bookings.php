<?php
include 'db.php';

$sql = "SELECT b.id, d.name AS destination_name, b.user_name, b.user_email, b.booking_date 
        FROM bookings b
        JOIN destinations d ON b.destination_id = d.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Bookings</title>
</head>
<body>
    <h1>Bookings</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Destination</th>
            <th>Name</th>
            <th>Email</th>
            <th>Booking Date</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['destination_name']; ?></td>
                <td><?php echo $row['user_name']; ?></td>
                <td><?php echo $row['user_email']; ?></td>
                <td><?php echo $row['booking_date']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
