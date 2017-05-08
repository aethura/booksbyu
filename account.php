<?php
session_start();
include('database.php');
$email = $_SESSION['email'];
$sq3 = "SELECT * FROM listing WHERE user = :user ORDER BY listingID DESC";
$stmt3 = $conn->prepare($sq3);
$stmt3->bindValue(':user', $email);
$stmt3->execute();
$yours = $stmt3->fetchAll();

if($_SESSION['logged_in'] != 1)
{
    header('location:index.html');
}
?>


<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE-edge">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/account.css">

    <title>Books By U</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>
<nav class="navbar navbar-inverse" role="navigation" style="background-color:#00703C">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#" style="color:#ffffff">Books By U</a>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="mainPage.php" style="color:#ffffff">Home</a>
                    </li>

                    <li>
                        <a href="post.php" style="color:#ffffff">Post</a>
                    </li>

                    <li>
                        <a href="logout.php" style="color:#ffffff">Sign Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
</body>


<div class="span7">
    <div class="widget stacked widget-table action-table">

        <div class="widget-header">
            <i class="icon-th-list"></i>
            <h3>Account Listings</h3>
        </div> <!-- /widget-header -->

        <div class="widget-content">

            <table class="table table-striped table-bordered" style="padding:10px">
                <thead>
                <tr>
                    <th>Date Posted</th>
                    <th>Title</th>
                    <th class="td-actions"></th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($yours as $you) : ?>
                <tr>
                    <td><?php echo $you['date'];?></td>
                    <td><a href="listing.php?ID=<?php echo $you['listingID']; ?>">
                            <?php echo $you['title']; ?></a></td>

                    <form action="update.php" method="post">
                        <td> <button type="submit" class="btn btn-primary btn-success" style="background-color: #00703C; color:#ffffff" name="update" value="<?php echo $you['listingID']; ?>"><span class="glyphicon glyphicon-pencil"></span> Update</button>
                    </form>
                    </td>

                    <form action="delete.php" method="post">
                        <td><button type="submit" class="btn btn-primary btn-success" style="background-color: #00703C; color:#ffffff" name="delete" value="<?php echo $you['listingID']; ?>"><span class="glyphicon glyphicon-remove"></span> Delete</button> </td>
                    </form>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div> <!-- /widget-content -->

    </div> <!-- /widget -->
</div>

<form action="deleteAccount.php" method="post">
<button type="submit" class="btn btn-primary btn-success" name="deleteAccount" value="<?php echo $you['user']; ?>" style="background-color: #00703C; color:#ffffff"><span class="glyphicon glyphicon-remove"></span> Delete Account</button>
</form>

</html>