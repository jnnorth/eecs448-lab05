<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "jnnorth1998", "euhahch9", "jnnorth1998");
    /* check connection */
    if ($mysqli->connect_errno)
    {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    
    $post_to_delete = $_GET["delete"];

    $query = "SELECT content, author_id FROM Posts";
    $count = 0;

    while ($count < count($post_to_delete))
    {
        $current_post[$count] = "DELETE FROM Posts WHERE post_id = $post_to_delete[$count]";
        $count++;
    }

    if ($result = $mysqli->query($query))
    {
        $result->free();
    }

    echo "Refresh HTML page view updated table!";

    //$mysqli->close();
?>
