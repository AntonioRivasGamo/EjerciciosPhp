<?php
require_once __DIR__ . '/../config/bootstrap.php';
setcookie('theme', e($_POST['theme']), time() + (86400 * 30), "/");
setcookie('elNum', e($_POST['elNum']), time() + (86400 * 30), "/");
setcookie('language', e($_POST['language']), time() + (86400 * 30), "/");
redirect('preferences.php');