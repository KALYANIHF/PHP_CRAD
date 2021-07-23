
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
$dbName = "steelCase1";
// create connection to the database.
$conn = new mysqli($servername, $username, $password, $dbName);
$sql = "CREATE TABLE table1(
    id int auto_increment Primary key,
    firstname varchar(255) not NULL,
    lastname varchar(255) not NULL
)";

if ($conn->connect_error) {
    die("The Connection is not made Successfuly" . $conn->connect_error);
}

if ($conn->query($sql) === true) {
    echo "The table is Created Successfully" . "<br>";
} else {
    echo "There is Some Problem in Creating Table" . "<br>";
}

$conn->close();

# The syntex of Procedural Way

$conn = mysqli_connect($servername, $username, $password, $dbName);
if (!$conn) {
    echo "The Database is Not Connected" . mysqli_connect_error();
}

$sql = "CREATE TABLE table2(
    id int auto_increment Primary key,
    firstname varchar(255) not null,
    lastname varchar(255) not null
)";
if (mysqli_query($conn, $sql)) {
    echo "The table is Created Successfully" . "<br>";
} else {
    echo "There is a Problem in creation of the table" . "<br>";
}

mysqli_close($conn);

# The syntax of Prepare Statement

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("CREATE TABLE table3(
        id int auto_increment Primary key,
        firstname varchar(255) not null,
        lastname varchar(255) not null
    )");
    $stmt->execute();

    echo "The Table is Created Successfully" . "<br>";

} catch (PDOException $e) {
    echo "The Table can not be created because" . $e->getMessage() . "<br>";
}

$conn = null;
