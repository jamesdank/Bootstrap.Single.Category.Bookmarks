# Bootstrap.Single.Category.Bookmarks

# Install Instructions
1. Create a database, import the bookmarks.sql file, and edit config.bookmarks.inc.php to match the database info.
2. Set the username and password on the 6th line in login.php, the default username and password is: $logins = array('username123' => 'password123');
   you can add multiple users by adding a comma and another pair, $logins = array('username123' => 'password123', 'john' => 'password123');
3. To add the drop downmenu to a page all you have to do is add an include file bookmarks.dropdown.menu.inc.php where you want the bookmark dropdown menu.
4. I haven't yet added the ability to add categories but it will be updated later, you'll have to enter those in manually, to add bookmarks use bookmark.insert.php ,
   I don't plan on adding the ability to edit or delete bookmark categories or bookmarks.
