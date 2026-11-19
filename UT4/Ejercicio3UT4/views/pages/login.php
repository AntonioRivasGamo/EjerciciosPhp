<section class="hero">
    <?php if ($error):?>
    <p id="error"><?= e(errorMailPassword()) ?></p>
    <?php endif;?>
    <form action="loginChecker.php" method="post">
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" placeholder="Email" required>
        <label for="password">Contraseña: </label>
        <input type="password" name="password" id="password" placeholder="Contraseña" required>
        <button type="submit">Login</button>
    </form>
</section>