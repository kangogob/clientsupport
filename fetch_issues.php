<?php
include("functions.php");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit();
}

// Create connection
$conn = dbConnection();

$sql = "SELECT id, issue FROM issues";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $issues = [];
    while($row = $result->fetch_assoc()) {
        $issues[] = $row;
    }
    echo json_encode(['success' => true, 'issues' => $issues]);
} else {
    echo json_encode(['success' => false, 'message' => 'No users found']);
}

$conn->close();
?>
