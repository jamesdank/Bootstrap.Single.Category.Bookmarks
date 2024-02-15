<?php
    echo '
        <div class="dropdown">
            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" 
            data-bs-toggle="dropdown" aria-expanded="false">Booksmarks</a>

            <ul class="dropdown-menu">
            ';
                require "config.bookmarks.inc.php";
            
                /* create a prepared statement */
                $stmt = mysqli_stmt_init($con);
                mysqli_stmt_prepare($stmt, "SELECT
                    bookmark_category_id, 
                    bookmark_category_title
                    FROM bookmark_categories ORDER BY bookmark_category_title");

                /* execute query */
                mysqli_stmt_execute($stmt);

                /* bind variables to prepared statement */
                mysqli_stmt_bind_result($stmt, $id, $title);

                /* fetch values */
                while (mysqli_stmt_fetch($stmt)) {
                    $title2 = str_replace(' ', '%20', $title);
                    echo "<li><a class='dropdown-item' href='bookmarks.php?id=" . $id . "&title=" . $title2 . "'>" . $title . "</a></li>";
                }  
    echo '       
            </ul>
        </div>
    ';
?>