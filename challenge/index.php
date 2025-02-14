<?php

// set AUTH_COOKIE to random string
putenv('AUTH_COOKIE=' . bin2hex(random_bytes(16)));

$log_file = 'app.log';

if (isset($_GET['page'])) {
    if ($_GET['page'] === 'index.php') {
        header('Location: ./');
        exit();
    }

    if (strpos($_GET['page'], '../') !== false) {
        header('HTTP/1.1 400 Bad Request');
?>
        <!DOCTYPE html>
        <html>

        <body>
            <h1>Error 400 - Bad Request</h1>
            <p>The requested page is not allowed.</p>
            <p>Please return to <a href="./">homepage</a>.</p>
        </body>

        </html>
    <?php
        exit();
    }

    // Include the requested page if it exists
    $page = $_GET['page'];
    if (file_exists(getcwd() . "/" . $page)) {
        include(getcwd() . "/" . $page);
        exit();
    } else {
        header('HTTP/1.1 404 Not Found');
    ?>
        <!DOCTYPE html>
        <html>

        <body>
            <h1>Error 404 - Page Not Found</h1>
            <p>The requested page does not exist.</p>
            <p>Please return to <a href="./">homepage</a>.</p>
        </body>

        </html>
<?php
        exit();
    }
}
?>
<!DOCTYPE html>
<html>

<body>
    <h1>Welcome!</h1>
    <a href="?page=login.php"><?php echo (getenv('AUTH_COOKIE')) ?>Login</a><br>
    <a href="?page=support.php">Support</a>
</body>

</html>