<?php
/**
 * Carrie Mao
 * Michael Blackley
 * Group9_HW06
 * Homework 6
 */

require_once('database.php');

$error = filter_input(INPUT_GET, 'error', FILTER_VALIDATE_INT);
if ($error == NULL || $error == FALSE) {
    $error = 0;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
    "http://www.w3.org/TR/html4/strict.dtd">

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Registration</title>


    <!-- Framework CSS -->
<!--    <link rel="stylesheet" href="stylesheet.css" type="text/css">
    <link rel="stylesheet" href="print.css" type="text/css" media="print">
    <link rel="stylesheet" href="ie.css" type="text/css" media="screen, projection">  -->
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="fonts">

    <!-- Website CSS style -->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <!-- Website Font style -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

    <title>Admin</title>
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
            <a class="navbar-brand" style="margin-left:500px; color:#ffffff">Books By U </a>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <!--  <a href="signup.php" style="margin-left:1025px; color:#ffffff">Sign Up</a>  -->
                        <a href="index.html" style="margin-left:1025px; color:#ffffff" class="btn btn-primary btn-success"><span class="glyphicon glyphicon-triangle-left"></span> Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>





<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
             <!--  <center><h1 class="title" style="color:#ffffff">Registration</h1></center>  -->
            </div>
        </div>

        <form id="dummy" action="signupHandler.php" method="post">
        <div class="main-login main-center">

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">First Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="firstname" id="firstname"  placeholder="Enter your First Name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="cols-sm-2 control-label">Last Name</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="Enter your Last Name"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="cols-sm-2 control-label">Email</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="cols-sm-2 control-label">Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"  placeholder="Confirm your Password"/>
                        </div>
                    </div>
                </div>

             <!--   <div class="form-group ">  -->
                    <button type="sumbit" class="btn btn-lg btn-success" style="margin-left:90px"><span class="glyphicon glyphicon-education"></span> Register</button>
             <!--   <a href="signup.php" style="margin-left:1025px; color:#ffffff" class="btn btn-lg btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Sign Up</a> -->

                <!--  </div>  -->
            </form>
        </div>
    </div>
</div>

<script type="text/javascript" src="assets/js/bootstrap.js"></script>




</body>
</html>


        <?php
        if($error == 1) {
            echo '<div class="error" style="color:#ff0000; background-color:#ffffff"> Email already used, please use another email.</div>';
        }

        elseif($error == 2)  {
            echo '<div class="error" style="color:#ff0000; background-color:#ffffff"> Password should be at least 8 charaters, 1 upper case letter [A-Z], one special character !,#,@.</div>';
        }

        elseif($error == 3) {
            echo '<div class="error" style="color:#ff0000; background-color:#ffffff"> Firstname and Lastname should only contain characters [A-Z] or [a-z].</div>';
        }

        elseif($error == 4) {
            echo '<div class="error" style="color:#ff0000; background-color:#ffffff"> Password and confirm password should match.</div>';
        }

        elseif($error == 5) {
            echo '<div class="error" style="color:#ff0000; background-color:#ffffff"> Please enter your UNCC email</div>';
        }

        else{
            echo '<div class="error" style="display:none"></div>';
        }

        ?>

