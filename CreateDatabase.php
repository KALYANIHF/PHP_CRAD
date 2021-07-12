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

// create connection to the database.
$conn = new mysqli($servername, $username, $password);
$sql = "CREATE DATABASE steelCase1";

if ($conn->connect_error) {
    die("The Connection is not made Successfuly" . $conn->connect_error);
}

if ($conn->query($sql) === true) {
    echo "The databse is Created Successfully";
} else {
    echo "There is Some Problem in Creating Database";
}

$conn->close();

# The syntex of Procedural Way

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    echo "The Database is Not Connected" . mysqli_connect_error();
}

$sql = "CREATE DATABASE steelCase2";
if (mysqli_query($conn, $sql)) {
    echo "The Databse is Created Successfully";
} else {
    echo "There is a Problem in creation of the database";
}

mysqli_close($conn);

# The syntax of Prepare Statement

try {

    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("CREATE DATABASE steelCase3");
    $stmt->execute();

    echo "The dataBase is Created Successfully";

} catch (PDOException $e) {
    echo "The database can not be created because" . $e->getMessage();
}

$conn = null;
