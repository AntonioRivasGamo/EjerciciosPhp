<?php

declare(strict_types=1);

/** Escapa un valor para insertarlo de forma segura en HTML. */
function e(string $value): string
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

/** Detecta HTTPS de forma suficiente para esta práctica local. */
function requestIsHttps(): bool
{
    return !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
}
