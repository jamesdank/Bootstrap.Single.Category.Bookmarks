<?php
    require "config.bookmarks.inc.php";
    
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $title = mysqli_real_escape_string($con, $_GET['title']);
    
    echo "</br><b>Home / Bookmarks / </b><b>" . $title . "</b></br></br>";
    
    /* create a prepared statement */
    $stmt = mysqli_stmt_init($con);
    mysqli_stmt_prepare($stmt, "SELECT 
        bookmark_date, 
        bookmark_title, 
        bookmark_bookmark 
        FROM bookmarks 
        WHERE bookmark_category_id = $id 
        ORDER BY bookmark_date");

    /* execute query */
    mysqli_stmt_execute($stmt);

    /* bind variables to prepared statement */
    mysqli_stmt_bind_result($stmt, $date, $btitle, $bookmark);
        
    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        $new_date = date("m-d-Y", strtotime($date));
        echo "<a href='" . $bookmark . " 'target='_blank'>" . $btitle . "</a> (" . $new_date . ")</br>";
    }
?>