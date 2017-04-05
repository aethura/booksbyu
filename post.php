<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 3/29/2017
 * Time: 2:55 PM
 */

?>
<html>

<form action="listingHandler.php" method="post">


Category/Subject: <select name="Category">
    <option value="Computer Science">Computer Science</option>
</select><br><br>

Book Title: <input type = "text" value ="Book Title" name = "title"><br><br>

    Author: <input type = "text" value ="Author" name = "author"><br><br>

Price:<input type = "text" value ="Price" name = "price"><br><br>

ISBN #:<input type = "text" value ="ISBN" name = "isbn"><br><br>

    Zip code:<input type = "text" value ="zip" name = "zip"><br><br>Description:<br>

 <textarea name="description" rows="7" cols="40">Add description here.</textarea><br><br>

    Condition: <input type="radio" name="condition" value="new" checked>New <input type="radio" name="condition" value="used">Used <br><br>

Contact: <input type="text" value="contact" name="contact"><br><br>

    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit"><br><br>

    <input type="submit" value="Submit">
</form>

</html>