<!DOCTYPE html>
<html>

<body>
    <h1>Login Page</h1>
    <form method="POST">
        <input type="text" name="user" placeholder="Username">
        <input type="password" name="pass" placeholder="Password">
        <button>Login</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo "Invalid credentials!";
    }
    ?>
</body>

</html>