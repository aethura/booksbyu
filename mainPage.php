<?php
/**
 * Created by PhpStorm.
 * User: brute
 * Date: 2/16/2017
 * Time: 2:19 PM
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Books 4 U</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
<form action="post.php" method="post">
    <input class="button" type = "submit" value="Post" onClick="location.href='post.php'" title="Post"/>
    </form>

<form action="" method="post">


        <div class="div1">
    <select>
        <option value="Categories">Categories</option>
        <option value="Accounting">Accounting</option>
        <option value="Computer Science">Computer Science</option>
        <option value="Mathematics">Mathematics</option>
        <option value="....">....</option>
    </select>

    <select>
        <option value="view">View</option>
        <option value="list">List</option>
        <option value="pic">Pictures</option>
    </select>
        </div>

         <div class="div2">
        <u>Price:</u>
             <br>
             <input type = "text" value ="min" name = "min">    <br>
             <input type = "text" value ="max" name = "max">    <br>

         <u>Condition</u>
             <br>
             <input type="checkbox" name="new" value="new">New<br>
             <input type="checkbox" name="used" value="used">Used<br>

         <u>Distance</u>
             <br>
             <input type="text" value="zip" name="zip"> <br>
    </div>

    <a href=""> <img src="" alt="img" style="width:304px;height:228px;"> </a>
    <a href=""> <img src="" alt="img" style="width:304px;height:228px;"> </a>
    <a href=""> <img src="" alt="img" style="width:304px;height:228px;"> </a>





</form>

</form>
</body>
</html>
