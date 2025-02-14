<?php

$log_file = 'app.log';

if (isset($_COOKIE['auth']) && $_COOKIE['auth'] === 'OAhG8QQBAPCyCRebiYVLcyahwENQxWMy2/auPDHHM74=') {
    $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'Unknown';

    $log_entry = sprintf(
        "[%s] IP: %s | Method: %s | URI: %s | User-Agent: %s | X-Traking-Id: %s\n",
        date('Y-m-d H:i:s'),
        $_SERVER['REMOTE_ADDR'],
        $_SERVER['REQUEST_METHOD'],
        $_SERVER['REQUEST_URI'],
        $user_agent,
        isset($_SERVER['HTTP_X_TRACKING_ID']) ? $_SERVER['HTTP_X_TRACKING_ID'] : 'Unknown'
    );

    file_put_contents($log_file, $log_entry, FILE_APPEND);
} else {
    header('HTTP/1.1 403 Forbidden');
?>
    <!DOCTYPE html>
    <html>

    <body>
        <h1>Error 403 - Forbidden</h1>
        <p>You are not allowed to access this page.</p>
        <p>Please return to <a href="./">homepage</a>.</p>
    </body>

    </html>
<?php
    exit();
}
