<?php
/**
 * Created by PhpStorm.
 * User: mrmrm_000
 * Date: 17/03/2018
 * Time: 04:35 م
 */
include_once("../include/functions.php");
include_once("../include/session.php");


?>



<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>login Admin</title>

    <link rel="stylesheet" href="static/css/bootstrap.css">
    <script src="static/js/bootstrap.min.js"></script>
    <script src="static/js/jquery.min.js"></script>
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #eee;
        }

        .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin .checkbox {
            font-weight: normal;
        }
        .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
        }
        .form-signin .form-control:focus {
            z-index: 2;
        }
        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>

</head>

<body>

    <div class="container">
        <?php echo  errL();?>
    </div>
    <div class="container">


        <form class="form-signin" method="post" action="submit_log.php">
            <h2 class="form-signin-heading">Please sign in</h2>
            <label for="username" class="sr-only">UserName: </label>
            <input type="text" id="username" class="form-control" name="username" placeholder="Enter Username" required autofocus>
            <br/> <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
            <br/>

            <input class="btn btn-lg  btn-primary btn-block" value="LogIn" name="submit" type="submit"/>

            </div>

        </form>

    </div> <!-- /container -->


</body>

</html>
