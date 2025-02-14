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

</html>