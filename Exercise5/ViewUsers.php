<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "jnnorth1998", "euhahch9", "jnnorth1998");

$my_users = array();
$query = "SELECT user_id FROM Users";

$current_row = 0;

if ($result = $mysqli->query($query))
{
    /* fetch associative array */
    while ($row = $result->fetch_assoc())
    {
       $current_row++;
       array_push($my_users, $row["user_id"]);
    }

    /* free result set */
    $result->free();
}

echo "<style>
table
{
  font-family: arial;
  border-collapse: collapse;
  width: 100%;
}

td, th
{
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even)
{
  background-color: Orange;
}
</style>";

 echo" <table> <tr> <th>Users: </th> </tr>";

for ($i = 0; $i < $current_row; $i++)
{
  echo"<tr><td>$my_users[$i]</td></tr>";
}

echo" </table>";
?>
