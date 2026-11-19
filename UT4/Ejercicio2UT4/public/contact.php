<?php
require_once __DIR__ . '/../config/bootstrap.php';
try {
    render('contact', [
        'title' => 'Contacto',
        'alias' => $alias,
        'paginasVisitadas' => $paginasVisitadas,
        'ultimaSeccionVisitada' => $ultimaSeccionVisitada,
        'ultimaActividad' => $ultimaActividad
    ]);
} catch (Exception $e) {

}