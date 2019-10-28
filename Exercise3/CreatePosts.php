<?php
  $user_id = $_GET["name"];
  $posts_id = $_GET["posts"];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "jnnorth1998", "euhahch9", "jnnorth1998");

  /* check connection */
  if ($mysqli->connect_errno)
  {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $query = "SELECT user_id FROM Users";
  $new_query = "INSERT INTO Posts(author_id, content) VALUES ('$user_id','$posts_id')";
  $flag = false;

  if ($result = $mysqli->query($query))
  {
      /* fetch associative array */
      while ($row = $result->fetch_assoc())
      {
         if ($row["user_id"] == $user_id)
         {
             $mysqli->query($new_query);
             $flag = true;
         }
      }

      if ($flag == false)
      {
          echo "User does not exist!\n";
      }

      /* free result set */
      $result->free();
  }

  else
  {
    echo "Error fetching user!";
  }

  /* close connection */
  $mysqli->close();
?>
