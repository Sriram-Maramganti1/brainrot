<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dictionary_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = $_POST["word"];

    // Prepare the SQL statement to avoid SQL injection
    $stmt = $conn->prepare("SELECT explanation FROM dictionary WHERE word = ?");
    $stmt->bind_param("s", $word);

    // Execute the statement
    $stmt->execute();
    $stmt->bind_result($explanation);

    if ($stmt->fetch()) {
        echo "Explanation: " . $explanation;
    } else {
        echo "No explanation found for: " . $word;
    }

    // Close the statement and connection
    $stmt->close();
}

$conn->close();
?>
