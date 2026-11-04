<?php
/**
 * Función genérica que convierte los caracteres especiales para evitar
 * problemas de seguridad
 * @param string $value
 * @return string
 */
function e(string $value): string {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Devuelve si la petición del servidor es a través de HTTPS o no
 * @return bool
 */
function requestIsHttps(): bool {
    return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
}

