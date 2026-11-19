<?php

function meepleHeader(?array $user) : void
{
    ?>
<header>
    <nav>
        <a href="index.php">Home</a>
        <a href="preferences.php">Preferences</a>
        <?php if ($user): ?>
        <a href="logout.php">Logout</a>
        <?php else: ?>
        <a href="login.php">Login</a>
        <?php endif; ?>
        <?php if (isset($user) && $user['role'] === 'admin'):?>
        <a href="admin.php">Admin</a>
        <?php endif;?>
    </nav>
</header>
<?php } ?>