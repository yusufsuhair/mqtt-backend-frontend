<?php
require('conn.php');

header('Content-Type: application/json');

$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
$table = "data";

if (!$mysqli) {
    die("Connection failed: " . $mysqli->error);
}

$query = sprintf("SELECT * FROM " . $table . " ORDER BY id ASC");

$result = $mysqli->query($query);

$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

$result->close();
$mysqli->close();
print json_encode($data);