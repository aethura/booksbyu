<?php




?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE-edge">
    <meta name="viewpoint" content="width=device-width, initial-scale=1">
    <meta name="description" content>
    <meta name="author" content>
    <link rel="stylesheet" href="css/bootstrap.css">

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
                        <a href="account.php" style="color:#ffffff">Account</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row">

        <h1>Are you sure you want to delete your account?</h1>
        <div class="form-group">
            <form method="post" action="deleteAccountHandler.php">
                <input type="hidden" name="ID" value="<?php echo $ID;?>">


                <button type="submit" name="deleteAccount" class="btn btn-primary" style="float:left; background-color: #00703C; color:#ffffff">
                    Yes
                </button>

            </form>

            <form method="post" action="account.php">
                <button class="btn btn-default" name="no" type="submit" style="float: left; margin-left:25px; background-color: #00703C; color:#ffffff">
                    No
                </button>
            </form>
        </div>




    </div>
</div>
</body>
</html>
