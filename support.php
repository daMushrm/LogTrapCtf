<!DOCTYPE html>
<html>

<body>
    <h1>Contact Support</h1>
    <form method="POST">
        <input type="text" name="message" placeholder="Your message" maxlength="500">
        <button>Submit</button>
    </form>
    <?php
    if (isset($_POST['message'])) {
        $message = trim($_POST['message']);

        if (empty($message)) {
            echo "<p style='color: red;'>Error: Message cannot be empty</p>";
        } elseif (strlen($message) > 500) {
            echo "<p style='color: red;'>Error: Message too long</p>";
        } else {
            $log_entry = sprintf(
                "[%s] | Message: %s\n",
                date('Y-m-d H:i:s'),
                $message
            );

            if (file_put_contents('messages-xiubfbeifwn.txt', $log_entry, FILE_APPEND) !== false) {
                echo "<p>Message has been sent.</p>";
            } else {
                echo "<p style='color: red;'>Error: Could not save message</p>";
            }
        }
    }
    ?>
</body>

</html>