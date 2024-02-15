<?php 
    session_start(); 
    
    if(isset($_POST['Submit'])){
    
        $logins = array('username123' => 'password123');
    
        $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
            
        if (isset($logins[$Username]) && $logins[$Username] == $Password  && $_GET['login'] == "bookmarks"){
            $_SESSION['UserData']['Username']=$logins[$Username];
            header("location:bookmark.insert.php");
            exit;
        } else {
            $msg="<span style='color:red'>Invalid Login Details</span>";
        }
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
                <form action="" method="post" name="Login_Form">
                    <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
                        <?php if(isset($msg)){?>
                        <tr>
                            <td colspan="2" align="center" valign="top">
                                <?php echo $msg;?>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2" align="left" valign="top">
                                <h3>Login</h3>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" valign="top">
                                Username
                            </td>
                            <td>
                                <input name="Username" type="text" class="Input">
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                Password
                            </td>
                            <td>
                                <input name="Password" type="password" class="Input">
                            </td>
                        </tr>
                        <tr>
                            <td> 

                            </td>
                            <td>
                                <input name="Submit" type="submit" value="Login" class="Button3">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <!-- Body -->
    </div>
    <!-- Footer -->
    <footer class="bg-body-tertiary text-center text-lg-start fixed-bottom">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            <a class="text-body" href="#">Footer</a>
        </div>
    </footer>
    <!-- Footer -->
</body>
</html>