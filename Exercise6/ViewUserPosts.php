<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "jnnorth1998", "euhahch9", "jnnorth1998");
    $current_user = $_GET["c_user"];

      /* check connection */
            if ($mysqli->connect_errno)
            {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            }

    // CSS for ViewUserPosts
    echo '<style>
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
      padding: 8px
    }

    tr:nth-child(even)
    {
      background-color: Orange;
    }
    </style>';

    $query = "SELECT content, author_id FROM Posts";

    if ($result = $mysqli->query($query))
    {
        echo '<table>';
        echo '<tr><th> Posts for ' . $current_user . '</th></tr>';

        while ($row = $result->fetch_assoc())
        {
            if ($row["author_id"] == $current_user)
            {
                echo '<tr><td>' . $row[content] . '</td></tr>';
            }

        }

        echo '</table>';

        /* free result set */
        $result->free();
        $mysqli->close();
    }
?>
