<?php
    if(isset($_GET['sid'])) {
        session_id($_GET['sid']);
    }
    if(session_status() != 2) {
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Required meta tags -->


    <title>Welcome to Webify</title>
    <!--<meta charset="utf-8">-->
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" name="viewport">
    <meta name="keywords" content="webify" />
    <meta name="description" content="web design, implementation solution" />


    <link type="image/x-icon" href="<?php echo $basePath; ?>images/favicon.ico" rel="shortcut icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $basePath; ?>css/bootstrap.min.css?v=1572311855">
    <link rel="stylesheet" href="<?php echo $basePath; ?>css/animate.min.css?v=1572311855">
    <link rel="stylesheet" href="<?php echo $basePath; ?>css/main.css?v=1572311855">
    <link rel="stylesheet" href="<?php echo $basePath; ?>css/custom.css?v=1572311855">
    <link rel="stylesheet" href="<?php echo $basePath; ?>css/swiper.min.css?v=1572311855">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo $basePath; ?>js/jquery.min.js"></script>
    <script src="<?php echo $basePath; ?>js/popper.min.js"></script>
    <script src="<?php echo $basePath; ?>js/bootstrap.min.js"></script>
    <script src="<?php echo $basePath; ?>js/anime.min.js"></script>


    <script src="<?php echo $basePath; ?>js/swiper.min.js?v=1572311855"></script>


    <link rel="stylesheet" href="<?php echo $basePath; ?>css/index.css?v=1572311855">
    <script> 
        function handleUsersLink(event, loggedUser, basePath) {
            event.preventDefault();
            if (loggedUser == 'null') {
                $("#admin-login-btn").click();
            } else {
                window.location.href= basePath+"users.php";
            }
        }
    </script>
</head>

<body>

    <header id="header">
        <div class="my-container">
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="<?php echo $basePath; ?>">
                        <img src="<?php echo $basePath; ?>images/logo_1.png" height="43">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content" id="navbarSupportedContent">
                        <ul class="navbar-nav " id="nav-link-ul">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo $basePath; ?>">Home</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo $basePath; ?>#about">About</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo $basePath; ?>#product">Products</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo $basePath; ?>#news">News</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="<?php echo $basePath; ?>contacts.php">Contact Us</a>
                            </li>
                            <li class="nav-item " onclick="handleUsersLink(event, 
                                <?php if(isset($_SESSION['logged_User'])): ?>
                                    '<?php echo $_SESSION['logged_User']; ?>'
                                <?php else: ?>
                                    'null'
                                <?php endif; ?>
                                ,'<?php echo $basePath ?>')">
                                <a id="nav-users-link" class="nav-link" href="<?php echo $basePath; ?>users.php">Users</a>
                            </li>
                        </ul>
                        <?php if(!isset($_SESSION['logged_User'])): ?>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#admin-login-modal" id="admin-login-btn">Admin Login</button>
                        <?php else:?>
                        <div style="display:flex;align-items:center;">
                            Welcome, <?php echo $_SESSION['logged_User']; ?>
                            <form action="logout.php" method="POST" style="margin-left:10px;">
                                <input class="btn btn-secondary" type="submit" name="logout" value="Logout">
                            </form>
                        </div>
                        <?php endif;?>
                </nav>
                <div class="modal fade" id="admin-login-modal" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content" id="login-modal-content">
                            <div class="modal-header" id="login-modal-header">
                                <h4 class="modal-title" id="myModalLabel">
                                    Admin Login
                                </h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-body">
                                <form role="form" method="POST" action="login.php">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Please enter username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Please enter password">
                                    </div>
                                    <div id="login-form-err-msg" style="color: red;">
                                    <?php if(isset($_SESSION['error'])): ?>
                                        <?php  echo $_SESSION['error']; ?>
                                    <?php endif; ?>
                                    </div>
                                    <input type="submit" class="btn btn-primary" name="login-submit" value="Submit">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel
                                </button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
                </div>
            </div>
        </div>
    </header>
    <div class="masker"></div>