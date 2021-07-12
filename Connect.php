<?php

// There are mainly three syntex to manupulate the Database using PHP
# 1. Object oriented (OOP).
# 2. Procedural Way.
# 3. PDO (PHP Data Object) - Using the PHP prepare statement.

# The syntex of OOP -----

# Assign all the modifier of the database.
$servername = "localhost";
$username = "root";
$password = "souvikmondal";
$dbName = "steelCase";
// create connection to the database.
$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("The Connection is not made Successfuly" . $conn->connect_error);
}
echo "Connected Successfully In Object Procedure" . "<br>";

$conn->close();

# The syntex of Procedural Way

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    echo "The Database is Not Connected" . mysqli_connect_error();
}
echo "Connected Successfully on Procedure process" . "<br>";

mysqli_close($conn);

# The syntax of Prepare Statement

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected Successfully";

} catch (PDOException $e) {
    echo "The database can not be created because" . $e->getMessage();
}

$conn = null;
