<?php
if (isset($_COOKIE['auth']) && $_COOKIE['auth'] === 'OAhG8QQBAPCyCRebiYVLcyahwENQxWMy2/auPDHHM74=') {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Messages Log</title>
        <style>
            .message {
                border-bottom: 1px solid #ccc;
                padding: 10px;
                margin: 5px;
            }
        </style>
    </head>

    <body>
        <h1>Messages</h1>
        <div id="messages">
            <?php
            if (file_exists('messages-xiubfbeifwn.txt')) {
                $messages = file_get_contents('messages-xiubfbeifwn.txt');
                $lines = explode("\n", $messages);
                foreach ($lines as $line) {
                    echo htmlspecialchars_decode($line) . "\n";
                }
            } else {
                echo "<p>No messages found.</p>";
            }
            ?>
        </div>
    </body>
    <script>
        function returnToHome() {
            document.cookie = "auth=";
            window.close();
        }
        setTimeout(() => {
            returnToHome();
        }, 1000);
    </script>

    </html>
<?php
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
}
?>