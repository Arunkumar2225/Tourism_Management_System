<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $destination_id = $_POST['destination_id'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $booking_date = date('Y-m-d');

    $sql = "INSERT INTO bookings (destination_id, user_name, user_email, booking_date)
            VALUES ('$destination_id', '$user_name', '$user_email', '$booking_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$destination_id = $_GET['destination_id'];
$sql = "SELECT * FROM destinations WHERE id = $destination_id";
$result = $conn->query($sql);
$destination = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Destination</title>
</head>
<body>
    <h1>Book <?php echo $destination['name']; ?></h1>
    <form method="post" action="book.php">
        <input type="hidden" name="destination_id" value="<?php echo $destination['id']; ?>">
        <label for="user_name">Name:</label>
        <input type="text" name="user_name" id="user_name" required><br>
        <label for="user_email">Email:</label>
        <input type="email" name="user_email" id="user_email" required><br>
        <button type="submit">Book Now</button>
    </form>
</body>
</html>
