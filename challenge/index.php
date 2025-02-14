<?php

$log_file = 'app.log';

if (isset($_GET['page']) && $_GET['page'] === 'index.php') {
    header('Location: ./');
    exit();
}

if (strpos($_GET['page'], 'log.php') !== false || strpos($_GET['page'], '../') !== false) {
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

$page = isset($_GET['page']) ? $_GET['page'] : null;

if ($page !== null) {
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
    <a href="?page=login.php">Login</a><br>
    <a href="?page=support.php">Support</a>
</body>

</html>