<?php

declare(strict_types=1);

function redirect(string $location): never
{
    header('Location: ' . $location);
    exit;
}