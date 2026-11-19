<?php

declare(strict_types=1);

/**
 * Renderiza una vista de views/pages dentro del layout común.
 *
 * @param array<string, mixed> $data
 */
function render(string $view, array $data = []): void
{
    $viewFile = APP_ROOT . '/views/pages/' . $view . '.php';

    if (!is_file($viewFile)) {
        throw new RuntimeException('Vista no encontrada: ' . $view);
    }

    extract($data, EXTR_SKIP);

    require APP_ROOT . '/views/layout/header.php';
    require $viewFile;
    require APP_ROOT . '/views/layout/footer.php';
}