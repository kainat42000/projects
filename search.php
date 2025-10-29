<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'];
    $sql = "SELECT * FROM events WHERE event_name LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Search Results</h2>";
        echo "<table border='1' cellpadding='8'>";
        echo "<tr><th>ID</th><th>Event Name</th><th>Date</th><th>Location</th><th>Description</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['event_name'] . "</td>";
            echo "<td>" . $row['event_date'] . "</td>";
            echo "<td>" . $row['location'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No events found!";
    }

    echo "<br><a href='index.php'>Go Back</a>";
    $conn->close();
} else {
    ?>
    <form method="POST" action="">
        <input type="text" name="search" placeholder="Enter event name..." required>
        <input type="submit" value="Search">
    </form>
    <?php
}
?>
