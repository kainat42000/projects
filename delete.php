<?php
include 'db.php';
$id = $_POST['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

    $sql = "DELETE FROM events WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Event Deleted Successfully! <a href='list.php'>Back to List</a>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
