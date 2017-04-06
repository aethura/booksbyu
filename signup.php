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
    <link rel="stylesheet" href="screen.css" type="text/css" media="screen, projection">
    <link rel="stylesheet" href="print.css" type="text/css" media="print">
    <!--[if lt IE 8]><link rel="stylesheet" href="ie.css" type="text/css" media="screen, projection"><![endif]-->
</head>
<body>
<div class="container">
    <h1>Registration Form </h1>
    <hr>
    <div class="span-3">
        <br/>
    </div>
    <div class="span-18">
        <?php
        if($error == 1) {
            echo '<div class="error"> Username already used, please use another username.</div>';
        }

        elseif($error == 2) {
            echo '<div class="error"> Username should contain 4-10 alphanumeric characters.</div>';
        }

        elseif($error == 3)  {
            echo '<div class="error"> Password should be at least 8 charaters, 1 upper case letter [A-Z], one special character !,#,@.</div>';
        }

        elseif($error == 4) {
            echo '<div class="error"> Password and confirm password should match.</div>';
        }

        elseif($error == 10) {
            echo '<div class="error"> Role was not selected.</div>';
        }

        elseif($error == 6) {
            echo '<div class="error"> Please select a gender.</div>';
        }

        elseif($error == 7) {
            echo '<div class="error"> Please enter the correct email format.</div>';
        }


        elseif($error == 11) {
            echo '<div class="error"> Please check the box to accept our terms.</div>';
        }

        elseif($error == 9) {
            echo '<div class="error"> Firstname and Lastname should only contain characters [A-Z] or [a-z].</div>';
        }

        else{
            echo '<div class="error" style="display:none"></div>';
        }

        ?>


        <form id="dummy" action="signupHandler.php" method="post" class="inline">
            <fieldset>
                <div class="span-9">

                    <p>
                        <label for="username">Username</label><br>
                        <input type="text" class="text" id="username" name="username" value="" >
                    </p>

                    <p>
                        <label for="password">Password</label><br>
                        <input type="password" class="text" id="password" name="password" value="">
                    </p>

                    <p>
                        <label for="confirmpassword">Confirm Password</label><br>
                        <input type="password" class="text" id="confirmpassword" name="confirmpassword" value="">
                    </p>

                    <p>
                        <label for="firstname">Firstname</label><br>
                        <input type="text" class="text" id="firstname" name="firstname" value="">
                    </p>

                </div>

                <div class="span-8 last">
                    <p>
                        <label for="email">Email</label><br>
                        <input type="text" class="text" id="email" name="email" value="">
                    </p>

                    <p>
                        <label for="lastname">Lastname</label><br>
                        <input type="text" class="text" id="lastname" name="lastname" value="">
                    </p>

                    <p>
                        <label>Gender</label><br>
                        <input type="radio" name="gender" value="male"> Male
                        <input type="radio" name="gender" value="female"> Female<br>
                    </p>

                    <p>
]]
                        <input type="reset" value="Reset">
                    </p>

                </div>

            </fieldset>
        </form>
    </div>
    <div class="span-3 last">
        <br/>
    </div>
</div>
</body>
</html>
