<?php

$mysqli = require __DIR__ ."/database.php";

$sql = sprintf("SELECT * FROM users
                WHERE email = '%s'",
                $mysqli->real_escape_string($_GET["email"]));

$result = $mysqli->query($sql);
$isAvailable = $result -> num_rows === 0;

header("Content-Type: application/json");
echo json_encode(["available" => $isAvailable]);