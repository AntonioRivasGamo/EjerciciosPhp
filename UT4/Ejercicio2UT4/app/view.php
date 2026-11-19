<?php
function render(string $view, $data = []) :void
{
    $viewFile = __DIR__ . "/../views/pages/" . $view . '.php';
    if (!file_exists($viewFile)) throw new Exception("View $viewFile not found");
    extract($data, EXTR_SKIP);
    $_SESSION['paginasVisitadas'] = $paginasVisitadas + 1;
    $_SESSION['ultimaSeccionVisitada'] = $title;
    require __DIR__ . '/../views/layout/userHeader.php';
    require $viewFile;
    require __DIR__ . '/../views/layout/infoFooter.php';
}