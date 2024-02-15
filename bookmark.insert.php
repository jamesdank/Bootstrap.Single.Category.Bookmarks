<?php 
    session_start();

    if(!isset($_SESSION['UserData']['Username'])) {
        header("location:login.php?login=bookmarks");
        exit;
    }
?>
<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </head>
<body>
    <!-- Nav Bar -->
    <?php require "includes/bookmarks.dropdown.menu.inc.php"; ?>
    <!-- Nav Bar -->
    <div class="container">
        <!-- Body -->
        <div class="row">
            <div class="col-md-10">
            <b><u>Insert Bookmark</u></b></br></br> 
                <form method="POST" name="form" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="title">Title</label> &nbsp; 
                    <input type="text" name="title" size="46"> <font color="red">(Required)</font></br>
                    <label for="bookmark">Bookmark</label> &nbsp; 
                    <input type="text" name="bookmark" size="42"> <font color="red">(Required)</font></br>
                    <label for="description">Description</label></br>
                    <textarea name="description" rows="4" cols="50"></textarea></br>
                    <select name="cat">
                        <option value="" disabled selected>Select Category</option>  
                        <?php
                            require "includes/config.bookmarks.inc.php";

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
                                echo "<option value='" . $id . "'>" . $title . "</option>";
                            }
                        ?>
                    </select></br>
                    <select name="hidden">
                        <option value="0" selected>Don't Hide</option>
                        <option value="1">Hide</option>
                    </select></br>
                    <input type="button" value="Add Bookmark" onclick="this.form.submit()">
                </form></br>
            </div>
        </div>
        <!-- Body -->
    </div>
    <!-- Footer -->
    <footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            <a class="text-body" href="#">footer</a>
        </div>
    </footer>
    <!-- Footer -->
</body>
</html>
<?php
    if(!empty($_POST['bookmark']) && isset($_POST['cat']) ){
        require "includes/config.bookmarks.inc.php";
        
        $date = date('Y-m-d');
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $bookmark = mysqli_real_escape_string($con, $_POST['bookmark']);
        $cat = mysqli_real_escape_string($con, $_POST['cat']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $hidden = mysqli_real_escape_string($con, $_POST['hidden']);

        /* create a prepared statement */
        $stmt = mysqli_stmt_init($con);
        mysqli_stmt_prepare($stmt, "INSERT INTO bookmarks 
            (bookmark_date, 
            bookmark_title, 
            bookmark_bookmark, 
            bookmark_category_id, 
            bookmark_description, 
            bookmark_hidden) 
            VALUES (?, ?, ?, ?, ?, ?)");

        /* bind parameters for markers */
        mysqli_stmt_bind_param($stmt, "sssisi", $date, $title, $bookmark, $cat, $description, $hidden);

        /* execute query */
        mysqli_stmt_execute($stmt);
        
        echo '<script language="javascript">';
        echo "alert('Bookmark inserted successfully');";
        echo '</script>';
    }
?>
