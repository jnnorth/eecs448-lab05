<?php
$user_id = $_GET["name"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "jnnorth1998", "euhahch9", "jnnorth1998");

/* check connection */
if ($mysqli->connect_errno)
{
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "INSERT INTO Users(user_id) VALUES('$user_id')";

if ($result = $mysqli->query($query))
{
    /* fetch associative array */
    while ($row = $result->fetch_assoc())
    {
        printf("Success\n");
    }
    /* free result set */
    $result->free();
}

else
{
  echo "Error: Form is blank or user could not be found!";
}

/* close connection */
$mysqli->close();
?>
