<?php
function navHeader($language,$langText) :void
{
    ?>
<header>
    <nav>
        <a href="index.php"><?= e($langText[$language]['home']) ?></a>
        <a href="preferences.php"><?= e($langText[$language]['preferences']) ?></a>
    </nav>
</header>
<?php } ?>