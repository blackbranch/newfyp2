<?php
include "assg_dbFunctions.php";
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <script src="https://kit.fontawesome.com/963544c9d0.js" crossorigin="anonymous"></script>        
        <title></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-black navbar-dark text-white sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand">
                    Hotel Review
                </a>
                <?php if (isset($_SESSION['username'])) { ?>
                    <div class="collapse navbar-collapse" id="collapsibleNavbar">
                        <ul class ="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="assg_hotels.php">Hotels</a>
                            </li>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <div class="d-flex" style="margin-right:10px">
                <ul class="navbar-nav">
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-user-gear"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="assg_EditProfile.php" class="dropdown-item">Edit Profile</a></li>
                                <li><a href="assg_logout.php" class="dropdown-item">Logout</a></li>
                                <li><a href="assg_Deactivate.php" class="dropdown-item">Deactivate account</a></li>
                                <li><a href="assg_ChangePassword.php" class="dropdown-item">Change password</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
                <?php if (isset($_SESSION['username'])) { ?>
                    <form class="d-flex" action="assg_Search.php" method="get">
                        <input class="form-control me-2" type="text" placeholder="Search" name="userSearch" style="width: 200px">
                        <button class="btn btn-secondary" type="submit" name="search">Search</button>
                    </form>
                <?php } ?>
            </div>
        </nav>
    </body>
</html>
