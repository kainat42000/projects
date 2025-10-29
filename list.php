<?php
include 'db.php';
$search = "";
if (isset($_POST['search'])) {
    $search = $_POST['search'];
}

$sql = "SELECT * FROM events WHERE event_name LIKE '%$search%' ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="style.css">
    <title>All Events</title>
</head>
<body>

    <h1> All Saved Events</h1>

    <form action="list.php" method="POST" style="margin-bottom: 25px;">
        <input type="text" name="search" placeholder="Search event by name..." value="<?php echo $search; ?>" required>
        <input type="submit" value="Search">
        <a href="list.php"><button type="button">Reset</button></a>
    </form>

    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='10'>";
        echo "<tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Event Date</th>
                <th>Location</th>
                <th>Description</th>
              </tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['event_name']}</td>
                    <td>{$row['event_date']}</td>
                    <td>{$row['location']}</td>
                    <td>{$row['description']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No Events Found!</p>";
    }
    ?>

    <div class="action-container">
        <div>
            <h2> Update Event</h2>
            <form method="POST" action="update.php">
                <input type="number" name="id" placeholder="Event ID" required><br>
                <input type="text" name="event_name" placeholder="New Event Name" required><br>
                <input type="date" name="event_date" required><br>
                <input type="text" name="location" placeholder="New Location" required><br>
                <input type="text" name="description" placeholder="New Description"><br>
                <input type="submit" value="Update">
            </form>
        </div>

        <div>
            <h3>🗑 Delete Event</h3>
            <form method="POST" action="delete.php">
                <input type="number" name="id" placeholder="Enter Event ID" required><br>
                <input type="submit" value="Delete">
            </form>
        </div>
    </div>

    <br>
    <a href="index.php"><button> Go Back to Main Page</button></a>
<footer>
    <p>© 2025 Mehfil-e-Magic | Developed by Kainat Khan</p>
</footer>

</body>
</html>

<?php $conn->close(); ?>
