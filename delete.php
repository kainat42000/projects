<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$id = $_POST['id'];

  $sql = "DELETE FROM events WHERE id=$id";
$conn->query($sql);
    if ($conn->affected_rows > 0) {
        echo "Event Deleted Successfully! <a href='list.php'>Back to List</a>";
    } else {
        echo "Error deleting record!! " . $conn->error;
    }
}

$conn->close();
?>
